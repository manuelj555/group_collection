<?php

namespace K2\GroupCollection;

/**
 * Description of GrupedItems
 *
 * @author Manuel Aguirre <programador.manuel@gmail.com>
 */
class GroupedItems implements \IteratorAggregate
{

    protected $title;
    protected $items;

    public function __construct($title, $items = array())
    {
        $this->title = $title;
        $this->items = $items;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function getIterator()
    {
        return new \ArrayIterator($this->items);
    }

    public function add($item)
    {
        $this->items[] = $item;
    }

    public function __toString()
    {
        return (string) $this->getTitle();
    }

}
