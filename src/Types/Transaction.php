<?php

namespace Chia\Types;

class Transaction
{
    public $signature = [];
    public $tx_id = '';
    public $raw_data = [];
    public $contract_ret = '';

    public function __construct(string $txID, array $rawData, string $contractRet)
    {
        $this->tx_id = $txID;
        $this->raw_data = $rawData;
        $this->contract_ret = $contractRet;
    }

    public function isSigned(): bool
    {
        return (bool)sizeof($this->signature);
    }
}
