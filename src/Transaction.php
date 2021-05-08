<?php

namespace Chia;

use Chia\Types\TransactionType;

class Transaction
{
    public $signature = [];
    public $tx_id = '';
    public $raw_data = [];
    public $contract_ret = '';

    public function __construct(TransactionType $transaction)
    {
        $this->tx_id = $transaction->tx_id;
        $this->raw_data = $transaction->raw_data;
        $this->contract_ret = $transaction->contract_ret;
    }

    public function isSigned(): bool
    {
        return (bool)sizeof($this->signature);
    }
}
