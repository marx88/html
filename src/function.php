<?php

declare(strict_types=1);

namespace Marx\Html;

/**
 * 快速实例化开放标签.
 */
function tag(string $tagName)
{
    return OpenTagNode::make($tagName);
}

/**
 * 快速实例化自闭和标签.
 */
function close_tag(string $tagName)
{
    return CloseTagNode::make($tagName);
}
