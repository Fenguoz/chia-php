<?php

namespace Chia\Types;

class TransactionType
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
}
