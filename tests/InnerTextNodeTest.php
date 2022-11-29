<?php

declare(strict_types=1);

namespace Marx\Html\Test;

use Marx\Html\InnerTextNode;
use PHPUnit\Framework\TestCase;

/**
 * 测试文本节点.
 *
 * @internal
 *
 * @coversNothing
 */
class InnerTextNodeTest extends TestCase
{
    public function testToString()
    {
        $obj = new InnerTextNode();
        $obj->text = 'hello';

        $this->assertEquals('hello', $obj->toString());
    }

    public function testMake()
    {
        $obj = InnerTextNode::make('hello world');

        $this->assertEquals('hello world', $obj->toString());
    }
}
