<?php

declare(strict_types=1);

namespace Marx\Html\Test;

use Marx\Html\CommentNode;
use PHPUnit\Framework\TestCase;

/**
 * 测试注释节点.
 *
 * @internal
 *
 * @coversNothing
 */
class CommentTest extends TestCase
{
    public function testToString()
    {
        $obj = new CommentNode();
        $obj->text = 'comment start';

        $this->assertEquals('<!-- comment start -->', $obj->toString());
    }
}
