<h1 align="center">Chia-PHP</h1>

## 概述

Chia-PHP 支持奇亚的 XCH 中常用生成地址，发起转账，签名等功能。

## 特点

1. 接口方法可可灵活增减

## 支持方法

### Full Node
- `getBlockchainState()`
- `getBlock()`
- `getBlocks()`
- `getBlockRecordByHeight()`
- `getBlockRecord()`
- `getBlockRecords()`
- `getUnfinishedBlockHeaders()`
- `getNetworkSpace()`
- `getAdditionsAndRemovals()`
- `getInitialFreezePeriod()`
- `getNetworkInfo()`
- `getCoinRecordsByPuzzleHash()`
- `getCoinRecordByName()`
- `pushTx()`
- `getAllMempoolTxIds()`
- `getAllMempoolItems()`
- `getMempoolItemByTxId()`

### Wallet
- `getPublicKeys()`
- `getPrivateKey()`
- `generateMnemonic()`
- `addKey()`
- `deleteKey()`
- `deleteAllKeys()`
- `getSyncStatus()`
- `getHeightInfo()`
- `getNetworkInfo()`
- `getWallets()`
- `createNewWallet()`
- `getWalletBalance()`
- `getTransaction()`
- `getTransactions()`
- `getNextAddress()`
- `sendTransaction()`
- `createBackup()`
- `getTransactionCount()`
- `getFarmedAmount()`
- `farmBlock()`
- `getInitialFreezePeriod()`

## 计划

- 完善接口
- 完善文档
- 完善测试用例
- ...
