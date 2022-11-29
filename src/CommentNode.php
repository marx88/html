<?php

declare(strict_types=1);

namespace Marx\Html;

/**
 * 注释节点.
 */
class CommentNode extends AbstractTextNode
{
    /**
     * {@inheritDoc}
     */
    public function toString(): string
    {
        return "<!-- {$this->text} -->";
    }
}
