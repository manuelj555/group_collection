<?php

namespace K2\GroupCollection;

use GroupIterator;
use IteratorAggregate;

/**
 * Description of AssetsExtension
 *
 * @author Manuel Aguirre <programador.manuel@gmail.com>
 */
class GroupCollection implements IteratorAggregate
{

    protected $items = array();
    protected $callback;
    protected $iterator;

    function __construct($items, $callback)
    {
        $this->items = $items;
        $this->callback = $callback;
    }

    protected function group()
    {
        $this->iterator = new GroupIterator();

        foreach ($this->items as $item) {
            $this->iterator->add($this->getKey($item), $item);
        }
    }

    protected function getKey($item)
    {
        return call_user_func($this->callback, $item);
    }

    public function getIterator()
    {
        return $this->iterator;
    }

}
