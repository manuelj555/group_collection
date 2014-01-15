<?php

namespace K2\GroupCollection;

use ArrayAccess;
use ArrayIterator;
use BadMethodCallException;
use InvalidArgumentException;
use IteratorAggregate;
use LogicException;

/**
 * Description of GrupedItems
 *
 * @author Manuel Aguirre <programador.manuel@gmail.com>
 */
class GroupedItems implements IteratorAggregate, ArrayAccess
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
        return new ArrayIterator($this->items);
    }

    public function add($item)
    {
        $this->items[] = $item;
    }

    public function __toString()
    {
        return (string) $this->getTitle();
    }

    public function __call($name, $arguments)
    {
        if (!method_exists($this->getTitle(), $name)) {
            throw new BadMethodCallException("Method $name does not exist");
        }

        return call_user_func_array(array($this->getTitle(), $name), $arguments);
    }

    public function __get($name)
    {
        if (!property_exists($this->getTitle(), $name)) {
            throw new InvalidArgumentException("property $name does not exist");
        }

        return $this->getTitle()->{$name};
    }

    public function offsetExists($offset)
    {
        return is_array($this->title) && isset($this->title[$offset]);
    }

    public function offsetGet($offset)
    {
        return $this->offsetExists($offset) ? $this->title[$offset] : null;
    }

    public function offsetSet($offset, $value)
    {
        throw new LogicException('Not supported');
    }

    public function offsetUnset($offset)
    {
        throw new LogicException('Not supported');
    }

}
