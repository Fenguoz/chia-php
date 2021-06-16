<?php

namespace Chia\Interfaces;

use Chia\Types\Address;

interface WalletInterface
{
    // Key management
    public function logIn(int $fingerprint);
    public function getPublicKeys();
    public function getPrivateKey(int $fingerprint);
    public function generateMnemonic();
    public function addKey(array $mnemonic, string $type = 'new_wallet');
    public function deleteKey(int $fingerprint);
    public function deleteAllKeys();

    // Wallet node
    public function getSyncStatus();
    public function getHeightInfo();
    public function farmBlock(string $address);
    public function getInitialFreezePeriod();
    public function getNetworkInfo();
    
    // Wallet management
    public function getWallets();
    public function createNewWallet($params);

    // Wallet
    public function getWalletBalance(int $walletId);
    public function getTransaction(string $transactionId);
    public function getTransactions(int $walletId);
    public function getNextAddress(int $walletId, bool $newAddress = true): Address;
    public function sendTransaction($walletId, $address, $amount, $fee);
    public function createBackup($filePath);
    public function getTransactionCount(int $walletId);
    public function getFarmedAmount();
    public function createSignedTransaction();

    // Coloured coins and trading
    // DID Wallet
    // RL wallet
}
