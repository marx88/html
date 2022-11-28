<?php

declare(strict_types=1);

namespace Marx\Html;

/**
 * 标签节点抽象类.
 */
abstract class AbstractTagNode extends AbstractNode
{
    /**
     * 标签名.
     *
     * @var string
     */
    public $tagName;

    /**
     * 属性.
     *
     * @var Attribute[]
     */
    protected $attrArr = [];

    /**
     * 创建实例.
     */
    public static function make(string $tagName)
    {
        $obj = new static();
        $obj->tagName = $tagName;

        return $obj;
    }

    /**
     * 批量添加属性.
     *
     * @return static
     */
    public function pushAttr(Attribute ...$attrArr)
    {
        foreach ($attrArr as $curAttr) {
            $this->attrArr[$curAttr->name] = $curAttr;
        }

        return $this;
    }

    /**
     * 添加属性.
     *
     * @return static
     */
    public function addAttr(string $name, string $value)
    {
        $attr = new Attribute();
        $attr->name = $name;
        $attr->value = $value;
        $this->pushAttr($attr);

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getID(): ?string
    {
        if (!isset($this->attrArr['id'])) {
            return null;
        }

        return $this->attrArr['id']->value;
    }

    /**
     * 属性转文本.
     */
    protected function attrToString(): string
    {
        if (empty($this->attrArr)) {
            return '';
        }

        $attrArr = [''];
        foreach ($this->attrArr as $curAttr) {
            $attrArr[] = $curAttr->toString();
        }

        return implode(' ', $attrArr);
    }
}
