<?php

declare(strict_types=1);

namespace Marx\Html\Test;

use Marx\Html\CloseTagNode;
use Marx\Html\OpenTagNode;
use Marx\Html\TextNode;
use PHPUnit\Framework\TestCase;

/**
 * 测试开放标签类.
 *
 * @internal
 *
 * @coversNothing
 */
class OpenTagNodeTest extends TestCase
{
    public function testPushNode()
    {
        $textNode = TextNode::make('hello world');

        $obj = OpenTagNode::make('span')->pushNode($textNode);

        $reflect = new \ReflectionClass($obj);
        $property = $reflect->getProperty('nodeArr');
        $property->setAccessible(true);
        $nodeArr = $property->getValue($obj);

        $this->assertCount(1, $nodeArr);
        $this->assertEquals($textNode, $nodeArr[0]);
    }

    public function testInsertNodeAfterID()
    {
        $div = OpenTagNode::make('div')
            ->pushNode(
                CloseTagNode::make('input')->addAttr('id', 'id'),
                CloseTagNode::make('input')->addAttr('id', 'age'),
            )
            ->insertNodeAfterID(
                CloseTagNode::make('input')->addAttr('id', 'name'),
                'id',
            )
        ;

        $reflect = new \ReflectionClass($div);
        $property = $reflect->getProperty('nodeArr');
        $property->setAccessible(true);
        $nodeArr = $property->getValue($div);

        $this->assertCount(3, $nodeArr);
        $this->assertEquals('name', $nodeArr[1]->getID());
    }

    public function testInsertNodeBeforeID()
    {
        $div = OpenTagNode::make('div')
            ->pushNode(
                CloseTagNode::make('input')->addAttr('id', 'id'),
                CloseTagNode::make('input')->addAttr('id', 'age'),
            )
            ->insertNodeBeforeID(
                CloseTagNode::make('input')->addAttr('id', 'name'),
                'age',
            )
        ;

        $reflect = new \ReflectionClass($div);
        $property = $reflect->getProperty('nodeArr');
        $property->setAccessible(true);
        $nodeArr = $property->getValue($div);

        $this->assertCount(3, $nodeArr);
        $this->assertEquals('name', $nodeArr[1]->getID());
    }

    public function testToString()
    {
        $div = OpenTagNode::make('div')->pushNode(CloseTagNode::make('br'));

        $this->assertEquals('<div>'.PHP_EOL.'<br/>'.PHP_EOL.'</div>', $div->toString());
    }
}
