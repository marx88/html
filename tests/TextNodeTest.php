<?php

declare(strict_types=1);

namespace Marx\Html\Test;

use Marx\Html\TextNode;
use PHPUnit\Framework\TestCase;

/**
 * 测试文本节点.
 *
 * @internal
 *
 * @coversNothing
 */
class TextNodeTest extends TestCase
{
    public function testToString()
    {
        $obj = new TextNode();
        $obj->text = '<!DOCTYPE html>';

        $this->assertEquals('<!DOCTYPE html>', $obj->toString());
    }

    public function testMake()
    {
        $obj = TextNode::make('hello world');

        $this->assertEquals('hello world', $obj->toString());
    }
}
