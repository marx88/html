<?php

declare(strict_types=1);

namespace Marx\Html;

/**
 * 自关闭标签.
 */
class CloseTagNode extends AbstractTagNode
{
    /**
     * {@inheritDoc}
     */
    public function toString(): string
    {
        $attr = $this->attrToString();

        return "<{$this->tagName}{$attr}/>";
    }
}
