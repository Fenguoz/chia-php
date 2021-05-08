<?php

namespace Chia;

use Chia\Interfaces\WalletInterface;
use Chia\Types\AddressType;
use Chia\Types\BlockType;
use Chia\Types\TransactionType;

class Wallet implements WalletInterface
{
    public function __construct()
    {
    }

    public function generateAddress(): AddressType
    {
    }

    public function balance(Address $address)
    {
    }

    public function transfer(Address $from, Address $to, float $amount): TransactionType
    {
    }

    public function blockNumber(): BlockType
    {
    }

    public function blockByNumber(int $blockID): BlockType
    {
    }
}
