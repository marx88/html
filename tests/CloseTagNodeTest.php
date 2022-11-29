<?php

declare(strict_types=1);

namespace Marx\Html\Test;

use Marx\Html\Attribute;

use function Marx\Html\close_tag;

use Marx\Html\CloseTagNode;
use PHPUnit\Framework\TestCase;

/**
 * 测试自闭合标签类.
 *
 * @internal
 *
 * @coversNothing
 */
class CloseTagNodeTest extends TestCase
{
    public function testPushAttr()
    {
        $attrID = Attribute::make('id', 'id-one');
        $attrName = Attribute::make('name', 'name-one');

        $obj = new CloseTagNode();
        $obj->pushAttr($attrID, $attrName);

        $reflect = new \ReflectionClass($obj);
        $property = $reflect->getProperty('attrArr');
        $property->setAccessible(true);
        $attrArr = $property->getValue($obj);

        $this->assertCount(2, $attrArr);
        $this->assertArrayHasKey('id', $attrArr);
        $this->assertArrayHasKey('name', $attrArr);
    }

    public function testAddAttr()
    {
        $obj = new CloseTagNode();
        $obj->addAttr('id', 'id-one');

        $reflect = new \ReflectionClass($obj);
        $property = $reflect->getProperty('attrArr');
        $property->setAccessible(true);
        $attrArr = $property->getValue($obj);

        $this->assertCount(1, $attrArr);
        $this->assertArrayHasKey('id', $attrArr);
    }

    public function testToString()
    {
        $attrID = Attribute::make('id', 'id-one');
        $attrName = Attribute::make('name', 'name-one');

        $obj = new CloseTagNode();
        $obj->pushAttr($attrID, $attrName);
        $obj->tagName = 'input';

        $this->assertEquals('<input id="id-one" name="name-one">', $obj->toString());
    }

    public function testMake()
    {
        $obj = close_tag('br');
        $this->assertEquals('<br>', $obj->toString());
    }

    public function testGetID()
    {
        $obj = CloseTagNode::make('br');
        $this->assertNull($obj->getID());

        $obj = CloseTagNode::make('input');
        $obj->addAttr('id', 'id-one');
        $this->assertEquals('id-one', $obj->getID());
    }
}
