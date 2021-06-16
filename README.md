<h1 align="center">Chia-PHP</h1>

## 概述

Chia-PHP 支持奇亚的 XCH 中获取当前区块链信息、获取当前高度、获取当前网络信息、创建新钱包、生成助记词、发起交易、获取交易记录等功能。

## 支持方法

### 节点

#### 区块链

- ✅当前区块链信息 `getBlockchainState()`
- ✅通过 `header_hash` 获取完整区块 `getBlock()`
- ✅获取完整区块列表 `getBlocks()`
- ✅通过 `height` 获取块记录 `getBlockRecordByHeight()`
- ✅通过 `header_hash` 获取块记录 `getBlockRecord()`
- ✅获取块记录列表 `getBlockRecords()`
- ✅获取未完成的头部块 `getUnfinishedBlockHeaders()`
- ✅获取总绘制空间的估计值 `getNetworkSpace()`
- ✅获取块的币种增删记录 `getAdditionsAndRemovals()`
- ✅获取区块链的初始冻结期 `getInitialFreezePeriod()`
- ✅获取当前网络信息 `getNetworkInfo()`

#### 币种

- ✅通过 `PuzzleHash` 获取币种记录 `getCoinRecordsByPuzzleHash()`
- ✅通过数组 `PuzzleHash` 获取币种记录 `getCoinRecordsByPuzzleHashes()`
- ✅通过 `币种名称/ID` 获取币种记录 `getCoinRecordByName()`
- 🚧 推送交易包到内存池和区块链 `pushTx()`

#### 内存池

- ✅获取交易ID(花费捆绑哈希)列表`getAllMempoolTxIds()`
- ✅获取内存池项目 `getAllMempoolItems()`
- ✅通过 `交易ID` 获取内存池项目 `getMempoolItemByTxId()`

### 钱包

#### 密钥管理

- ✅指定 `finger` 为激活状态 `logIn()`
- ✅获取钱包公钥 `getPublicKeys()`
- ✅获取钱包私钥 `getPrivateKey()`
- ✅生成助记词 `generateMnemonic()`
- ✅添加钥匙串 `addKey()`
- ✅删除私钥 `deleteKey()`
- ✅删除所有私钥 `deleteAllKeys()`

#### 钱包节点

- ✅获取钱包同步状态 `getSyncStatus()`
- ✅获取当前高度 `getHeightInfo()`
- ✅农场块`farmBlock()`
- ✅获取区块链初始冻结期 `getInitialFreezePeriod()`
- ✅获取当前网络信息 `getNetworkInfo()`

#### 钱包管理

- ✅获取钱包列表 `getWallets()`
- 🚧 创建新钱包 `createNewWallet()`

#### 钱包

- ✅获取钱包余额 `getWalletBalance()`
- ✅通过 `交易hash` 获取交易记录 `getTransaction()`
- ✅获取交易记录 `getTransactions()`
- ✅获取新地址 `getNextAddress()`
- ✅发起交易 `sendTransaction()`
- ✅创建备份 `createBackup()`
- ✅获取钱包交易数量 `getTransactionCount()`
- ✅获取农场奖励信息 `getFarmedAmount()`
- 🚧 `createSignedTransaction()`

#### 其他币种和交易 🚧 
#### DID 钱包 🚧 
#### RL 钱包 🚧 

## 快速开始

### 安装

``` php
// 未开放
composer require fenguoz/chia-php
```

### 接口调用

``` php
/* 节点(Full Node) */
$fullNode = [
    'base_uri' => 'https://localhost:8555',
    'verify' => false,
    'cert' => '/your/private_full_node.crt/path',// private_full_node.crt
    'ssl_key' => '/your/private_full_node.key/path',// private_full_node.key
];

$api = new \Chia\Api(new \GuzzleHttp\Client($fullNode));
$fullNode = new Chia\FullNode($api);
$info = $fullNode->getNetworkInfo();
// $info->network_name      mainnet
// $info->network_prefix    xch

/* 钱包(Wallet) */
$fullNode = [
    'base_uri' => 'https://localhost:9256',
    'verify' => false,
    'cert' => '/your/private_wallet.crt/path',// private_wallet.crt
    'ssl_key' => '/your/private_wallet.key/path', // private_wallet.key
];

$api = new \Chia\Api(new \GuzzleHttp\Client($fullNode));
$wallet = new Chia\Wallet($api);
$info = $wallet->getNetworkInfo();
```

## 计划

- 增加参数和响应检验类
- 完善文档
- 完善测试用例
- ...
