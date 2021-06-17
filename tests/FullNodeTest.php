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

class FullNodeTest extends TestCase
{
    const HEIGHT = 10000;
    const HEADER_HASH = '0x7b1f89923b5d7a5fafbb5a9c379adb4fc8c49be491e12fbddd19c7317544bdd0';
    const NEWER_BLOCK_HEADER_HASH = '0xb9663a08958712cd0dc9e736e39103d8b837b90dcd41c8c3ad2c75703c3e1497';
    const OLDER_BLOCK_HEADER_HASH = '0x75083cc77cce34680d5a1a2e576e4072e3fba1cee4d7336f5a0ebc2497019bea';
    const PUZZLE_HASH = '0xae2910a112f9e6bf435a4b1fa96fd899ec12902312f89f67061b6d61fc3ee3ef';
    const COIN_NAME = '0x6670bce2194f74bc02c9becc6266fa7935166cf204859a6760c451b1f1d3ca8d';
    const MEMPOOL_TX_ID = '0xe3438724619b62e63bfedeb7e2ae8a6130dc58948a4a3d7bbde876ed40b03dd3';
    const START = 1;
    const END = 2;

    private function fullNode()
    {
        $config = [
            'base_uri' => 'https://localhost:8555',
            'verify' => false,
            'cert' => __DIR__ . '/private_full_node.crt',
            'ssl_key' => __DIR__ . '/private_full_node.key',
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
        // var_dump($data);
        $this->assertTrue(true);
    }

    public function testGetBlock()
    {
        $data = $this->fullNode()->getBlock(self::HEADER_HASH);
        // var_dump($data);
        $this->assertTrue(true);
    }

    public function testGetBlocks()
    {
        $data = $this->fullNode()->getBlocks(self::START,self::END);
        // var_dump($data);
        $this->assertTrue(true);
    }

    public function testGetBlockRecordByHeight()
    {
        $data = $this->fullNode()->getBlockRecordByHeight(self::HEIGHT);
        // var_dump($data);
        $this->assertTrue(true);
    }

    public function testGetBlockRecord()
    {
        $data = $this->fullNode()->getBlockRecord(self::HEADER_HASH);
        // var_dump($data);
        $this->assertTrue(true);
    }

    public function testGetBlockRecords()
    {
        $data = $this->fullNode()->getBlockRecords(self::START, self::END);
        // var_dump($data);
        $this->assertTrue(true);
    }

    public function testGetUnfinishedBlockHeaders()
    {
        $data = $this->fullNode()->getUnfinishedBlockHeaders();
        // var_dump($data);
        $this->assertTrue(true);
    }

    public function testGetNetworkSpace()
    {
        $data = $this->fullNode()->getNetworkSpace(self::NEWER_BLOCK_HEADER_HASH, self::OLDER_BLOCK_HEADER_HASH);
        // var_dump($data);
        $this->assertTrue(true);
    }

    public function testGetAdditionsAndRemovals()
    {
        $data = $this->fullNode()->getAdditionsAndRemovals(self::HEADER_HASH);
        // var_dump($data);
        $this->assertTrue(true);
    }

    public function testGetInitialFreezePeriod()
    {
        $data = $this->fullNode()->getInitialFreezePeriod();
        // var_dump($data);
        $this->assertTrue(true);
    }

    public function testGetNetworkInfo()
    {
        $data = $this->fullNode()->getNetworkInfo();
        // var_dump($data);
        $this->assertTrue(true);
    }

    public function testGetCoinRecordsByPuzzleHash()
    {
        $data = $this->fullNode()->getCoinRecordsByPuzzleHash(self::PUZZLE_HASH);
        // var_dump($data);
        $this->assertTrue(true);
    }

    public function testGetCoinRecordsByPuzzleHashes()
    {
        $data = $this->fullNode()->getCoinRecordsByPuzzleHashes([self::PUZZLE_HASH]);
        // var_dump($data);
        $this->assertTrue(true);
    }

    public function testGetCoinRecordByName()
    {
        $data = $this->fullNode()->getCoinRecordByName(self::COIN_NAME);
        // var_dump($data);
        $this->assertTrue(true);
    }

    // public function testPushTx()
    // {
    //     $data = $this->fullNode()->pushTx();
    //     var_dump($data);
    //     $this->assertTrue(true);
    // }

    public function testGetAllMempoolTxIds()
    {
        $data = $this->fullNode()->getAllMempoolTxIds();
        // var_dump($data);
        $this->assertTrue(true);
    }

    public function testGetAllMempoolItems()
    {
        $data = $this->fullNode()->getAllMempoolItems();
        // var_dump($data);
        $this->assertTrue(true);
    }
    
    public function testGetMempoolItemByTxId()
    {
        $data = $this->fullNode()->getMempoolItemByTxId(self::MEMPOOL_TX_ID);
        // var_dump($data);
        $this->assertTrue(true);
    }

}
