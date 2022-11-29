<?php

declare(strict_types=1);

namespace Marx\Html;

/**
 * 文本节点.
 */
abstract class AbstractTextNode extends AbstractNode
{
    /**
     * 节点文本.
     *
     * @var string
     */
    public $text;

    /**
     * 快速创建.
     */
    public static function make(string $text)
    {
        $obj = new static();
        $obj->text = $text;

        return $obj;
    }

    /**
     * {@inheritDoc}
     */
    public function getID(): ?string
    {
        return null;
    }
}
