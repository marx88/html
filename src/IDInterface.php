<?php

declare(strict_types=1);

namespace Marx\Html;

/**
 * 获取节点ID接口.
 */
interface IDInterface
{
    /**
     * 获取节点ID.
     */
    public function getID(): ?string;
}
