<?php

declare(strict_types=1);

namespace Marx\Html;

/**
 * 注释节点.
 */
class CommentNode extends TextNode
{
    /**
     * 节点文本.
     *
     * @var string
     */
    public $text;

    /**
     * {@inheritDoc}
     */
    public function toString(): string
    {
        return "<!-- {$this->text} -->";
    }
}
