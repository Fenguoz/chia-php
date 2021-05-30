<?php

namespace Chia;

use Chia\Exceptions\ChiaErrorException;
use Chia\Interfaces\FullNodeInterface;

class FullNode implements FullNodeInterface
{
    public function __construct(Api $_api, array $config = [])
    {
        $this->_api = $_api;
    }

    public function getBlockchainState()
    {
        $body = $this->_api->post('/get_blockchain_state');

        if ($body->success == false) {
            throw new ChiaErrorException($body->error);
        }
        return $body->blockchain_state;
    }

    public function getBlock(string $headerHash)
    {
        $body = $this->_api->post('/get_block', [
            'header_hash' => $headerHash
        ]);

        if ($body->success == false) {
            throw new ChiaErrorException($body->error);
        }
        return $body->block;
    }

    public function getBlocks()
    {
        // $body = $this->_api->post('/get_blocks', [
        // ]);

        // if ($body->success == false) {
        //     throw new ChiaErrorException($body->error);
        // }
        // return $body->blocks;
    }

    public function getBlockRecordByHeight(int $height)
    {
        $body = $this->_api->post('/get_block_record_by_height', [
            'height' => $height
        ]);

        if ($body->success == false) {
            throw new ChiaErrorException($body->error);
        }
        return $body->block_record;
    }

    public function getBlockRecord()
    {
        // $body = $this->_api->post('/get_block_record');

        // if ($body->success == false) {
        //     throw new ChiaErrorException($body->error);
        // }
        // return $body;
    }

    public function getBlockRecords()
    {
        // $body = $this->_api->post('/get_block_records');

        // if ($body->success == false) {
        //     throw new ChiaErrorException($body->error);
        // }
        // return $body;
    }

    public function getUnfinishedBlockHeaders()
    {
        // $body = $this->_api->post('/get_unfinished_block_headers');

        // if ($body->success == false) {
        //     throw new ChiaErrorException($body->error);
        // }
        // return $body;
    }

    public function getNetworkSpace()
    {
        // $body = $this->_api->post('/get_network_space');

        // if ($body->success == false) {
        //     throw new ChiaErrorException($body->error);
        // }
        // return $body;
    }

    public function getAdditionsAndRemovals()
    {
        // $body = $this->_api->post('/get_additions_and_removals');

        // if ($body->success == false) {
        //     throw new ChiaErrorException($body->error);
        // }
        // return $body;
    }

    public function getInitialFreezePeriod()
    {
        // $body = $this->_api->post('/get_initial_freeze_period');

        // if ($body->success == false) {
        //     throw new ChiaErrorException($body->error);
        // }
        // return $body;
    }

    public function getNetworkInfo()
    {
        // $body = $this->_api->post('/get_network_info');

        // if ($body->success == false) {
        //     throw new ChiaErrorException($body->error);
        // }
        // return $body;
    }

    public function getCoinRecordsByPuzzleHash()
    {
        // $body = $this->_api->post('/get_coin_records_by_puzzle_hash');

        // if ($body->success == false) {
        //     throw new ChiaErrorException($body->error);
        // }
        // return $body;
    }

    public function getCoinRecordByName()
    {
        // $body = $this->_api->post('/get_coin_record_by_name');

        // if ($body->success == false) {
        //     throw new ChiaErrorException($body->error);
        // }
        // return $body;
    }

    public function pushTx()
    {
        // $body = $this->_api->post('/push_tx');

        // if ($body->success == false) {
        //     throw new ChiaErrorException($body->error);
        // }
        // return $body;
    }

    public function getAllMempoolTxIds()
    {
        // $body = $this->_api->post('/get_all_mempool_tx_ids');

        // if ($body->success == false) {
        //     throw new ChiaErrorException($body->error);
        // }
        // return $body;
    }

    public function getAllMempoolItems()
    {
        // $body = $this->_api->post('/get_all_mempool_items');

        // if ($body->success == false) {
        //     throw new ChiaErrorException($body->error);
        // }
        // return $body;
    }

    public function getMempoolItemByTxId()
    {
        // $body = $this->_api->post('/get_mempool_item_by_tx_id');

        // if ($body->success == false) {
        //     throw new ChiaErrorException($body->error);
        // }
        // return $body;
    }
}
