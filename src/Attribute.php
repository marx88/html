<?php

declare(strict_types=1);

namespace Marx\Html;

/**
 * 属性类.
 */
class Attribute
{
    /**
     * 属性名.
     *
     * @var string
     */
    public $name;

    /**
     * 属性指.
     *
     * @var null|string
     */
    public $value;

    /**
     * 创建实例.
     */
    public static function make(string $name, string $value)
    {
        $obj = new static();
        $obj->name = $name;
        $obj->value = $value;

        return $obj;
    }

    /**
     * 获取属性文本.
     */
    public function toString()
    {
        if (is_null($this->value)) {
            return $this->name;
        }

        return "{$this->name}=\"{$this->value}\"";
    }
}
