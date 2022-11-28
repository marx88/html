<?php

declare(strict_types=1);

namespace Marx\Html;

/**
 * html节点抽象类.
 */
abstract class AbstractNode implements NodeInterface,IDInterface
{
    /**
     * 生成节点文本.
     */
    abstract public function toString(): string;

    /**
     * 获取节点ID.
     */
    abstract public function getID(): ?string;
}
