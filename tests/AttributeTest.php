<?php

declare(strict_types=1);

namespace Marx\Html\Test;

use Marx\Html\Attribute;
use PHPUnit\Framework\TestCase;

/**
 * 测试属性类.
 *
 * @internal
 *
 * @coversNothing
 */
class AttributeTest extends TestCase
{
    public function testToString()
    {
        $obj = new Attribute();
        $obj->name = 'class';
        $obj->value = 'class-one class-two';

        $this->assertEquals('class="class-one class-two"', $obj->toString());
    }

    public function testMake()
    {
        $obj = Attribute::make('id', 'id-one');

        $this->assertEquals('id="id-one"', $obj->toString());
    }
}
