<?php

namespace Chia;

use Chia\Types\BlockType;

class Block
{
    public $block_id;
    public $block_header;
    public $transactions;

    public function __construct(BlockType $block)
    {
        $this->block_id = $block->block_id;
        $this->block_header = $block->block_header;
        $this->transactions = $block->transactions;
    }
}
