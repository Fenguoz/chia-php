<?php

namespace Chia;

use Chia\Exceptions\ChiaErrorException;
use Chia\Interfaces\WalletInterface;
use Chia\Types\Address;

class Wallet implements WalletInterface
{
    public function __construct(Api $_api, array $config = [])
    {
        $this->_api = $_api;
    }

    public function logIn(int $fingerprint)
    {
        $body = $this->_api->post('/log_in', [
            'fingerprint' => $fingerprint
        ]);

        if ($body->success == false) {
            throw new ChiaErrorException($body->error);
        }
        return true;
    }

    public function getPublicKeys()
    {
        $body = $this->_api->post('/get_public_keys');

        if ($body->success == false) {
            throw new ChiaErrorException($body->error);
        }
        return $body->public_key_fingerprints;
    }

    public function getPrivateKey(int $fingerprint)
    {
        $body = $this->_api->post('/get_private_key', [
            'fingerprint' => $fingerprint
        ]);

        if ($body->success == false) {
            throw new ChiaErrorException('The fingerprint not exist');
        }
        return $body->private_key;
    }

    public function generateMnemonic()
    {
        $body = $this->_api->post('/generate_mnemonic');

        if ($body->success == false) {
            throw new ChiaErrorException($body->error);
        }
        return $body->mnemonic;
    }

    public function addKey(array $mnemonic, string $type = 'new_wallet')
    {
        $body = $this->_api->post('/add_key', [
            'mnemonic' => $mnemonic,
            'type' => $type,
        ]);

        if ($body->success == false) {
            throw new ChiaErrorException($body->error);
        }
        return $body->fingerprint;
    }

    public function deleteKey(int $fingerprint)
    {
        $body = $this->_api->post('/delete_key', [
            'fingerprint' => $fingerprint
        ]);

        if ($body->success == false) {
            throw new ChiaErrorException($body->error);
        }
        return true;
    }

    public function deleteAllKeys()
    {
        $body = $this->_api->post('/delete_all_keys');

        if ($body->success == false) {
            throw new ChiaErrorException($body->error);
        }
        return true;
    }

    public function getSyncStatus()
    {
        $body = $this->_api->post('/get_sync_status');

        if ($body->success == false) {
            throw new ChiaErrorException($body->error);
        }
        unset($body->success);
        return $body;
    }

    public function getHeightInfo()
    {
        $body = $this->_api->post('/get_height_info');

        if ($body->success == false) {
            throw new ChiaErrorException($body->error);
        }
        return $body->height;
    }

    public function getNetworkInfo()
    {
        $body = $this->_api->post('/get_network_info');

        if ($body->success == false) {
            throw new ChiaErrorException($body->error);
        }
        unset($body->success);
        return $body;
    }

    public function getWallets()
    {
        $body = $this->_api->post('/get_wallets');

        if ($body->success == false) {
            throw new ChiaErrorException($body->error);
        }
        return $body->wallets;
    }

    public function createNewWallet($params)
    {
        if (!isset($params['host']) || empty($params['host'])) {
            throw new ChiaErrorException('host cannot be empty');
        }
        if (!isset($params['wallet_type']) || empty($params['wallet_type'])) {
            throw new ChiaErrorException('wallet_type cannot be empty');
        }

        if (!in_array($params['wallet_type'], ['cc_wallet', 'rl_wallet', 'did_wallet'])) {
            throw new ChiaErrorException('wallet_type error');
        }

        if ($params['wallet_type'] == 'cc_wallet') {
            if (!isset($params['mode']) || empty($params['mode'])) {
                throw new ChiaErrorException('mode cannot be empty');
            }
            if ($params['mode'] == 'new') {
            } elseif ($params['mode'] == 'existing') {
            }
        } elseif ($params['wallet_type'] == 'rl_wallet') {
            if (!isset($params['rl_type']) || empty($params['rl_type'])) {
                throw new ChiaErrorException('rl_type cannot be empty');
            }
            if ($params['rl_type'] == 'admin') {
            } elseif ($params['rl_type'] == 'user') {
            }
        } elseif ($params['wallet_type'] == 'did_wallet') {
            if (!isset($params['did_type']) || empty($params['did_type'])) {
                throw new ChiaErrorException('did_type cannot be empty');
            }
            if ($params['did_type'] == 'new') {
            } elseif ($params['did_type'] == 'recovery') {
            }
        }

        $body = $this->_api->post('/create_new_wallet', $params);

        if ($body->success == false) {
            throw new ChiaErrorException($body->error);
        }
        return true;
    }

    public function getWalletBalance(int $walletId)
    {
        $body = $this->_api->post('/get_wallet_balance', [
            'wallet_id' => $walletId
        ]);

        if ($body->success == false) {
            throw new ChiaErrorException($body->error);
        }
        return $body->wallet_balance;
    }
    public function getTransaction(string $transactionId)
    {
        $body = $this->_api->post('/get_transaction', [
            'transaction_id' => $transactionId
        ]);

        if ($body->success == false) {
            throw new ChiaErrorException($body->error);
        }
        unset($body->success);
        return $body;
    }

    public function getTransactions(int $walletId)
    {
        $body = $this->_api->post('/get_transactions', [
            'wallet_id' => $walletId
        ]);

        if ($body->success == false) {
            throw new ChiaErrorException($body->error);
        }
        return $body->transactions;
    }

    public function getNextAddress(int $walletId, bool $newAddress = true): Address
    {
        $body = $this->_api->post('/get_next_address', [
            'wallet_id' => $walletId,
            'new_address' => $newAddress
        ]);

        if ($body->success == false) {
            throw new ChiaErrorException($body->error);
        }
        return new Address($body->address);
    }

    public function sendTransaction($walletId, $address, $amount, $fee)
    {
        $body = $this->_api->post('/send_transaction', [
            'wallet_id' => $walletId,
            'address' => $address,
            'amount' => $amount,
            'fee' => $fee
        ]);

        if ($body->success == false) {
            throw new ChiaErrorException($body->error);
        }
        unset($body->success);
        return $body;
    }

    public function createBackup($filePath)
    {
        $body = $this->_api->post('/create_backup', [
            'file_path' => $filePath
        ]);

        if ($body->success == false) {
            throw new ChiaErrorException($body->error);
        }
        return $body;
    }

    public function getTransactionCount(int $walletId)
    {
        $body = $this->_api->post('/get_transaction_count', [
            'wallet_id' => $walletId
        ]);

        if ($body->success == false) {
            throw new ChiaErrorException($body->error);
        }
        return $body->count;
    }

    public function getFarmedAmount()
    {
        $body = $this->_api->post('/get_farmed_amount');

        if ($body->success == false) {
            throw new ChiaErrorException($body->error);
        }
        unset($body->success);
        return $body;
    }

    public function farmBlock(string $address)
    {
        $body = $this->_api->post('/farm_block', [
            'address' => $address
        ]);

        if ($body->success == false) {
            throw new ChiaErrorException($body->error);
        }
        return true;
    }

    public function getInitialFreezePeriod()
    {
        $body = $this->_api->post('/get_initial_freeze_period');

        if ($body->success == false) {
            throw new ChiaErrorException($body->error);
        }
        return $body->INITIAL_FREEZE_END_TIMESTAMP;
    }

    public function createSignedTransaction()
    {
        $body = $this->_api->post('/create_signed_transaction');

        if ($body->success == false) {
            throw new ChiaErrorException($body->error);
        }
        return $body;
    }
}
