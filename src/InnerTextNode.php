<?php

declare(strict_types=1);

namespace Marx\Html;

/**
 * Inner文本节点.
 */
class InnerTextNode extends AbstractTextNode
{
    /**
     * {@inheritDoc}
     */
    public function toString(): string
    {
        return $this->text;
    }
}
