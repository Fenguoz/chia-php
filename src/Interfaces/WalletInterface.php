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

    public function getWalletBalance($walletId = 1);

    public function getTransaction();

    public function getTransactions();

    public function getNextAddress(int $walletId = 1, bool $newAddress = true): Address;

    public function sendTransaction();

    public function createBackup();

    public function getTransactionCount();

    public function getFarmedAmount();

    public function farmBlock();

    public function getInitialFreezePeriod();
}
