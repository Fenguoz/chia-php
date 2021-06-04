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

    public function getBlocks(int $start, int $end)
    {
        $body = $this->_api->post('/get_blocks', [
            'start' => $start,
            'end' => $end
        ]);

        if ($body->success == false) {
            throw new ChiaErrorException($body->error);
        }
        return $body->blocks;
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

    public function getBlockRecord(string $headerHash)
    {
        $body = $this->_api->post('/get_block_record', [
            'header_hash' => $headerHash
        ]);

        if ($body->success == false) {
            throw new ChiaErrorException($body->error);
        }
        return $body->block_record;
    }

    public function getBlockRecords(int $start, int $end)
    {
        $body = $this->_api->post('/get_block_records', [
            'start' => $start,
            'end' => $end
        ]);

        if ($body->success == false) {
            throw new ChiaErrorException($body->error);
        }
        return $body->block_records;
    }

    public function getUnfinishedBlockHeaders()
    {
        $body = $this->_api->post('/get_unfinished_block_headers');

        if ($body->success == false) {
            throw new ChiaErrorException($body->error);
        }
        return $body->headers;
    }

    public function getNetworkSpace(string $newerBlockHeaderHash, string $olderBlockHeaderHash)
    {
        $body = $this->_api->post('/get_network_space', [
            'newer_block_header_hash' => $newerBlockHeaderHash,
            'older_block_header_hash' => $olderBlockHeaderHash
        ]);

        if ($body->success == false) {
            throw new ChiaErrorException($body->error);
        }
        return $body->space;
    }

    public function getAdditionsAndRemovals(string $headerHash)
    {
        $body = $this->_api->post('/get_additions_and_removals', [
            'header_hash' => $headerHash
        ]);

        if ($body->success == false) {
            throw new ChiaErrorException($body->error);
        }
        unset($body->success);
        return $body;
    }

    public function getInitialFreezePeriod()
    {
        $body = $this->_api->post('/get_initial_freeze_period');

        if ($body->success == false) {
            throw new ChiaErrorException($body->error);
        }
        return $body->INITIAL_FREEZE_END_TIMESTAMP;
    }

    public function getNetworkInfo()
    {
        $body = $this->_api->post('/get_network_info');

        if ($body->success == false) {
            throw new ChiaErrorException($body->error);
        }
        unset($body->success);
        return $body;
    }

    public function getCoinRecordsByPuzzleHash(string $puzzleHash, int $startHeight = null, int $endHeight = null, $includeSpentCoins = null)
    {
        $params = [];
        $params['puzzleHash'] = $puzzleHash;
        if ($startHeight) $params['start_height'] = $puzzleHash;
        if ($endHeight) $params['end_height'] = $endHeight;
        if ($includeSpentCoins) $params['include_spent_coins'] = $includeSpentCoins;
        $body = $this->_api->post('/get_coin_records_by_puzzle_hash', $params);

        if ($body->success == false) {
            throw new ChiaErrorException($body->error);
        }
        return $body->coin_records;
    }

    public function getCoinRecordByName(string $coinName)
    {
        $body = $this->_api->post('/get_coin_record_by_name', [
            'name' => $coinName
        ]);

        if ($body->success == false) {
            throw new ChiaErrorException($body->error);
        }
        return $body->coin_record;
    }

    public function pushTx(array $spendBundle)
    {
        $body = $this->_api->post('/push_tx', [
            'spend_bundle' => json_encode($spendBundle)
        ]);

        if ($body->success == false) {
            throw new ChiaErrorException($body->error);
        }
        return $body->status;
    }

    public function getAllMempoolTxIds()
    {
        $body = $this->_api->post('/get_all_mempool_tx_ids');

        if ($body->success == false) {
            throw new ChiaErrorException($body->error);
        }
        return $body->tx_ids;
    }

    public function getAllMempoolItems()
    {
        $body = $this->_api->post('/get_all_mempool_items');

        if ($body->success == false) {
            throw new ChiaErrorException($body->error);
        }
        return $body->mempool_items;
    }

    public function getMempoolItemByTxId(string $txId)
    {
        $body = $this->_api->post('/get_mempool_item_by_tx_id', [
            'tx_id' => $txId
        ]);

        if ($body->success == false) {
            throw new ChiaErrorException($body->error);
        }
        return $body->mempool_item;
    }
}
