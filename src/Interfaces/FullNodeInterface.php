<?php

namespace Chia\Interfaces;

interface FullNodeInterface
{
    # Blockchain
    public function getBlockchainState();
    public function getBlock(string $headerHash);
    public function getBlocks(int $start, int $end, $excludeHeaderHash = null);
    public function getBlockRecordByHeight(int $height);
    public function getBlockRecord(string $headerHash);
    public function getBlockRecords(int $start, int $end);
    public function getUnfinishedBlockHeaders();
    public function getNetworkSpace(string $newerBlockHeaderHash, string $olderBlockHeaderHash);
    public function getAdditionsAndRemovals(string $headerHash);
    public function getInitialFreezePeriod();
    public function getNetworkInfo();

    # Coins
    public function getCoinRecordsByPuzzleHash(string $puzzleHash, int $startHeight = null, int $endHeight = null, $includeSpentCoins = null);
    public function getCoinRecordsByPuzzleHashes(array $puzzleHashs, int $startHeight = null, int $endHeight = null, $includeSpentCoins = null);
    public function getCoinRecordByName(string $coinName);
    public function pushTx(array $spendBundle);

    # Mempool
    public function getAllMempoolTxIds();
    public function getAllMempoolItems();
    public function getMempoolItemByTxId(string $txId);
}
