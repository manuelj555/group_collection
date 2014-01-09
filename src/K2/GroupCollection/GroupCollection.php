<?php

namespace K2\GroupCollection;

use IteratorAggregate;

/**
 * Description of AssetsExtension
 *
 * @author Manuel Aguirre <programador.manuel@gmail.com>
 */
class GroupCollection implements IteratorAggregate
{

    protected $iterator;

    function __construct($items, $callback)
    {
        $this->group($items, $callback);
    }

    protected function group($items, $callback)
    {
        $this->iterator = new GroupIterator();

        foreach ($items as $item) {
            $this->iterator->add($this->getKey($item, $callback), $item);
        }
    }

    protected function getKey($item, $callback)
    {
        return call_user_func($callback, $item);
    }

    public function getIterator()
    {
        return $this->iterator;
    }

}
