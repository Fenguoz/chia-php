<?php

namespace Chia;

use GuzzleHttp\Client;
use Chia\Exceptions\ChiaErrorException;

class Api
{
    private $_client;

    public function __construct(Client $client)
    {
        $this->_client = $client;
    }

    public function getClient(): Client
    {
        return $this->_client;
    }

    /**
     * Abstracts some common functionality like formatting the post data
     * along with error handling.
     *
     * @throws ChiaErrorException
     */
    public function post(string $endpoint, array $data = [], bool $returnAssoc = false)
    {
        if (sizeof($data)) {
            $data = ['json' => $data];
        }else{
            $data = ['json' => []];
        }

        $stream = (string)$this->getClient()->post($endpoint, $data)->getBody();
        $body = json_decode($stream, $returnAssoc);

        $this->checkForErrorResponse($returnAssoc, $body);

        return $body;
    }

    /**
     * Check if the response has an error and throw it.
     *
     * @param bool $returnAssoc
     * @param $body
     * @throws ChiaErrorException
     */
    private function checkForErrorResponse(bool $returnAssoc, $body)
    {
        if ($returnAssoc) {
            if (isset($body['Error'])) {
                throw new ChiaErrorException($body['Error']);
            } elseif (isset($body['code']) && isset($body['message'])) {
                throw new ChiaErrorException($body['code'] . ': ' . hex2bin($body['message']));
            }
        }

        if (isset($body->Error)) {
            throw new ChiaErrorException($body->Error);
        } elseif (isset($body->code) && isset($body->message)) {
            throw new ChiaErrorException($body->code . ': ' . hex2bin($body->message));
        }
    }
}
