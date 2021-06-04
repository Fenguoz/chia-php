<?php

namespace Chia\Interfaces;

use Chia\Types\Address;

interface WalletInterface
{
    public function getPublicKeys();

    public function getPrivateKey(int $fingerprint);

    public function generateMnemonic();

    public function addKey(array $mnemonic);

    public function deleteKey(int $fingerprint);

    public function deleteAllKeys();

    public function getSyncStatus();

    public function getHeightInfo();

    public function getNetworkInfo();

    public function getWallets();

    public function createNewWallet($params);

    public function getWalletBalance(int $walletId = 1);

    public function getTransaction(string $transactionId);

    public function getTransactions(int $walletId);

    public function getNextAddress(int $walletId = 1, bool $newAddress = true): Address;

    public function sendTransaction($walletId, $address, $amount, $fee);

    public function createBackup($filePath);

    public function getTransactionCount(int $walletId);

    public function getFarmedAmount();

    public function farmBlock(string $address);

    public function getInitialFreezePeriod();
}
