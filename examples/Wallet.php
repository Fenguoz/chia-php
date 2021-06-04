<?php

use Chia\Api;
use Chia\Wallet;
use GuzzleHttp\Client;

include_once '../vendor/autoload.php';

$wallet = [
    'base_uri' => 'https://localhost:9256',
    'verify' => false,
    'cert' => getcwd() . '/private_wallet.crt',
    'ssl_key' => getcwd() . '/private_wallet.key',
    'headers' => [
        'Content-Type' => 'application/json'
    ]
];

$api = new Api(new Client($wallet));
$wallet = new Wallet($api, []);

// $ret = $wallet->getHeightInfo();
// var_dump($ret);
$ret = $wallet->sendTransaction(1,'xch14c53pggjl8nt7s66fv06jm7cn8kp9yprztuf7ecxrdkkrlp7u0hs9mdpyc', 1,0);
var_dump($ret);
