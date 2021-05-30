<?php

namespace Chia\Interfaces;

interface FullNodeInterface
{
    public function getBlockchainState();

    public function getBlock(string $headerHash);

    public function getBlocks();

    public function getBlockRecordByHeight(int $height);

    public function getBlockRecord();

    public function getBlockRecords();

    public function getUnfinishedBlockHeaders();

    public function getNetworkSpace();

    public function getAdditionsAndRemovals();

    public function getInitialFreezePeriod();

    public function getNetworkInfo();

    public function getCoinRecordsByPuzzleHash();

    public function getCoinRecordByName();

    public function pushTx();

    public function getAllMempoolTxIds();

    public function getAllMempoolItems();

    public function getMempoolItemByTxId();
}
