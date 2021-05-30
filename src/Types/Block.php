<?php

namespace Chia\Types;

class Block
{
    public $block_id;
    public $block_header;
    public $transactions;

    public function __construct(string $blockID, array $blockHeader, array $transactions = [])
    {
        if (!strlen($blockID)) {
            throw new \Exception('blockID empty');
        }

        $this->block_id = $blockID;
        $this->block_header = $blockHeader;
        $this->transactions = $transactions;
    }
}
