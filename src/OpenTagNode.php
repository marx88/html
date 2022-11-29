<?php

declare(strict_types=1);

namespace Marx\Html;

/**
 * 开放标签.
 */
class OpenTagNode extends AbstractTagNode
{
    /**
     * 内部节点.
     *
     * @var AbstractNode[]
     */
    protected $nodeArr = [];

    /**
     * 添加内部节点.
     *
     * @return static
     */
    public function pushNode(NodeInterface ...$nodeArr)
    {
        array_push($this->nodeArr, ...$nodeArr);

        return $this;
    }

    /**
     * 在ID节点后插入节点.
     *
     * @return static
     */
    public function insertNodeAfterID(NodeInterface $node, string $id)
    {
        $index = 0;
        foreach ($this->nodeArr as $curNode) {
            ++$index;
            if ($curNode->getID() === $id) {
                break;
            }
        }
        array_splice($this->nodeArr, $index, 0, [$node]);

        return $this;
    }

    /**
     * 在ID节点前插入节点.
     *
     * @return static
     */
    public function insertNodeBeforeID(NodeInterface $node, string $id)
    {
        $index = 0;
        foreach ($this->nodeArr as $curNode) {
            if ($curNode->getID() === $id) {
                break;
            }
            ++$index;
        }
        array_splice($this->nodeArr, $index, 0, [$node]);

        return $this;
    }

    /**
     * 添加InnerText.
     */
    public function innerText(string $text)
    {
        return $this->pushNode(InnerTextNode::make($text));
    }

    /**
     * {@inheritDoc}
     */
    public function toString(): string
    {
        $attr = $this->attrToString();
        $nodeArr = ["<{$this->tagName}{$attr}>"];
        foreach ($this->nodeArr as $curNode) {
            $nodeArr[] = $curNode->toString();
        }
        $nodeArr[] = "</{$this->tagName}>";

        return implode('', $nodeArr);
    }
}
