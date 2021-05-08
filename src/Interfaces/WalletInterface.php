<?php

namespace Chia\Interfaces;

use Chia\Address;
use Chia\Types\AddressType;
use Chia\Types\BlockType;
use Chia\Types\TransactionType;

interface WalletInterface
{
    public function generateAddress(): AddressType;

    public function balance(Address $address);

    public function transfer(Address $from, Address $to, float $amount): TransactionType;

    public function blockNumber(): BlockType;

    public function blockByNumber(int $blockID): BlockType;
}
