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
use Chia\Wallet;
use GuzzleHttp\Client;
use PHPUnit\Framework\TestCase;

class WalletTest extends TestCase
{
    const WALLET_ID = 1;
    const FINGERPTINT = 10000000000;
    const MNEMONIC = [
        'this',
        'is',
        'your',
        'mnemonic'
    ];
    const ADDRESS = 'xch14c5....';
    const COIN_NAME = '0x6670bce2194f74bc02c9becc6266fa7935166cf204859a6760c451b1f1d3ca8d';
    const PUZZLE_HASH = '0xae2910a112f9e6bf435a4b1fa96fd899ec12902312f89f67061b6d61fc3ee3ef';
    const FILE_PATH = '/this/is/file/path';

    private function wallet()
    {
        $config = [
            'base_uri' => 'https://localhost:9256',
            'verify' => false,
            'cert' => __DIR__ . '/private_wallet.crt',
            'ssl_key' => __DIR__ . '/private_wallet.key',
            'headers' => [
                'Content-Type' => 'application/json'
            ]
        ];
        $api = new Api(new Client($config));
        $wallet = new Wallet($api, []);
        return $wallet;
    }

    public function testLogIn()
    {
        $data = $this->wallet()->logIn(self::FINGERPTINT);
        // var_dump($data);
        $this->assertTrue(true);
    }

    public function testGetPublicKeys()
    {
        $data = $this->wallet()->getPublicKeys();
        // var_dump($data);
        $this->assertTrue(true);
    }

    public function testGetPrivateKey()
    {
        $data = $this->wallet()->getPrivateKey(self::FINGERPTINT);
        // var_dump($data);
        $this->assertTrue(true);
    }

    public function testGenerateMnemonic()
    {
        $data = $this->wallet()->generateMnemonic();
        // var_dump($data);
        $this->assertTrue(true);
    }

    public function testAddKey()
    {
        $data = $this->wallet()->addKey(self::MNEMONIC);
        // var_dump($data);
        $this->assertTrue(true);
    }

    // public function testDeleteKey()
    // {
    //     $data = $this->wallet()->deleteKey(self::FINGERPTINT);
    //     // var_dump($data);
    //     $this->assertTrue(true);
    // }
    // public function testDeleteAllKeys()
    // {
    //     $data = $this->wallet()->deleteAllKeys();
    //     // var_dump($data);
    //     $this->assertTrue(true);
    // }

    public function testGetSyncStatus()
    {
        $data = $this->wallet()->getSyncStatus();
        // var_dump($data);
        $this->assertTrue(true);
    }

    public function testGetHeightInfo()
    {
        $data = $this->wallet()->getHeightInfo();
        // var_dump($data);
        $this->assertTrue(true);
    }
    public function testFarmBlock()
    {
        $data = $this->wallet()->farmBlock(self::ADDRESS);
        // var_dump($data);
        $this->assertTrue(true);
    }

    public function testGetInitialFreezePeriod()
    {
        $data = $this->wallet()->getInitialFreezePeriod();
        // var_dump($data);
        $this->assertTrue(true);
    }

    public function testGetNetworkInfo()
    {
        $data = $this->wallet()->getNetworkInfo();
        // var_dump($data);
        $this->assertTrue(true);
    }

    public function testGetWallets()
    {
        $data = $this->wallet()->getWallets();
        // var_dump($data);
        $this->assertTrue(true);
    }

    // public function testCreateNewWallet()
    // {
    //     $params = [];
    //     $data = $this->wallet()->createNewWallet($params);
    //     $this->assertTrue(true);
    // }

    public function testGetWalletBalance()
    {
        $data = $this->wallet()->getWalletBalance(self::WALLET_ID);
        // var_dump($data);
        $this->assertTrue(true);
    }

    public function testGetTransaction()
    {
        $data = $this->wallet()->getTransaction(self::COIN_NAME);
        // var_dump($data);
        $this->assertTrue(true);
    }

    public function testGetTransactions()
    {
        $data = $this->wallet()->getTransactions(self::WALLET_ID);
        // var_dump($data);
        $this->assertTrue(true);
    }

    public function testGetNextAddress()
    {
        $data = $this->wallet()->getNextAddress(self::WALLET_ID);
        // var_dump($data);
        $this->assertTrue(true);
    }

    // public function testSendTransaction()
    // {
    //     $amount = 1;
    //     $fee = 0;
    //     $data = $this->wallet()->sendTransaction(self::WALLET_ID, self::ADDRESS, $amount, $fee);
    //     // var_dump($data);
    //     $this->assertTrue(true);
    // }

    // public function testCreateBackup()
    // {
    //     $data = $this->wallet()->createBackup(self::FILE_PATH);
    //     // var_dump($data);
    //     $this->assertTrue(true);
    // }

    public function testGetTransactionCount()
    {
        $data = $this->wallet()->getTransactionCount(self::WALLET_ID);
        // var_dump($data);
        $this->assertTrue(true);
    }

    public function testGetFarmedAmount()
    {
        $data = $this->wallet()->getFarmedAmount(self::WALLET_ID);
        // var_dump($data);
        $this->assertTrue(true);
    }

    // public function testCreateSignedTransaction()
    // {
    //     $data = $this->wallet()->createSignedTransaction(self::WALLET_ID);
    //     // var_dump($data);
    //     $this->assertTrue(true);
    // }
}
