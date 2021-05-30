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
    const HOST = 'https://localhost:9256';
    const CERT = getcwd() . '/private_wallet.crt';
    const SSL_KEY = getcwd() . '/private_wallet.key';
    const WALLET_ID = 1;
    const FINGERPTINT = 100000;
    const MNEMONIC = [
        'this',
        'is',
        'your',
        'mnemonic'
    ];

    private function wallet()
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
        $wallet = new Wallet($api, []);
        return $wallet;
    }

    public function testGetPublicKeys()
    {
        $data = $this->wallet()->getPublicKeys();
        $this->assertTrue(true);
    }

    public function testGetPrivateKey()
    {
        $data = $this->wallet()->getPrivateKey(self::FINGERPTINT);
        $this->assertTrue(true);
    }

    public function testGenerateMnemonic()
    {
        $data = $this->wallet()->generateMnemonic();
        $this->assertTrue(true);
    }

    public function testAddKey()
    {
        $data = $this->wallet()->addKey(self::MNEMONIC);
        $this->assertTrue(true);
    }

    public function testGetSyncStatus()
    {
        $data = $this->wallet()->getSyncStatus();
        $this->assertTrue(true);
    }

    public function testGetHeightInfo()
    {
        $data = $this->wallet()->getHeightInfo();
        $this->assertTrue(true);
    }

    public function testGetNetworkInfo()
    {
        $data = $this->wallet()->getNetworkInfo();
        $this->assertTrue(true);
    }

    public function testGetWallets()
    {
        $data = $this->wallet()->getWallets();
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
        $this->assertTrue(true);
    }

    public function testGetNextAddress()
    {
        $data = $this->wallet()->getNextAddress(self::WALLET_ID);
        $this->assertTrue(true);
    }
}
