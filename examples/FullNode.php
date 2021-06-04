<?php

use Chia\Api;
use Chia\FullNode;
use GuzzleHttp\Client;

include_once '../vendor/autoload.php';

$fullNode = [
    'base_uri' => 'https://localhost:8555',
    'verify' => false,
    'cert' => getcwd() . '/private_full_node.crt',
    'ssl_key' => getcwd() . '/private_full_node.key',
];

$api = new Api(new Client($fullNode));
$fullNode = new FullNode($api, []);
//coin_name 0xc481aa35e69cd8744379a8b60ef3b00a975e07923db99ce2b6f21aabaee09eab
// $ret = $fullNode->getCoinRecordByName('0xc481aa35e69cd8744379a8b60ef3b00a975e07923db99ce2b6f21aabaee09eab');
$ret = $fullNode->getNetworkInfo();
var_dump($ret);


function hexstrToBytes($str)
{
    $chunks = str_split($str, 2);
    $result = '\x' . implode('\x', $chunks);
    return $result;
}
