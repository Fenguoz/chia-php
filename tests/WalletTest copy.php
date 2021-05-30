<?php

/**
 * This file is part of the chia-php package
 *
 * @category chia-php
 * @package  chia-php
 * @author   Fenguoz <243944672@qq.com>
 * @license  https://github.com/Fenguoz/chia-php/blob/master/LICENSE MIT
 * @link     https://github.com/Fenguoz/chia-php
 */

namespace Tests;

use Chia\Api;
use Chia\FullNode;
use GuzzleHttp\Client;
use PHPUnit\Framework\TestCase;

class WalletTest extends TestCase
{
    const HOST = 'https://localhost:8555';
    const CERT = getcwd() . '/private_full_node.crt';
    const SSL_KEY = getcwd() . '/private_full_node.key';
    const HEIGHT = 10000;
    const HEADER_HASH = '0xhash....';

    private function fullNode()
    {
        $config = [
            'base_uri' => self::HOST,
            'verify' => false,
            'cert' => self::CERT,
            'ssl_key' => self::SSL_KEY,
            'headers' => [
                'Content-Type' => 'application/json'
            ]
        ];
        $api = new Api(new Client($config));
        $fullNode = new FullNode($api, []);
        return $fullNode;
    }

    public function testGetBlockchainState()
    {
        $data = $this->fullNode()->getBlockchainState();
        $this->assertTrue(true);
    }

    public function testGetBlock()
    {
        $data = $this->fullNode()->getBlock(self::HEADER_HASH);
        $this->assertTrue(true);
    }

    public function testGetBlockRecordByHeight()
    {
        $data = $this->fullNode()->getBlockRecordByHeight(self::HEIGHT);
        $this->assertTrue(true);
    }
}
