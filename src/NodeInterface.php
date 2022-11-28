<?php

declare(strict_types=1);

namespace Marx\Html;

/**
 * html节点接口.
 */
interface NodeInterface
{
    /**
     * 生成节点文本.
     */
    public function toString(): string;
}
