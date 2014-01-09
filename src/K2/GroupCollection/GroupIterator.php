<?php

use K2\GroupCollection\GroupedItems;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of GroupIterator
 *
 * @author Manuel Aguirre <programador.manuel@gmail.com>
 */
class GroupIterator implements Iterator
{

    private $items = array();
    private $titles = array();

    public function current()
    {
        return $this->items[$this->key()];
    }

    public function key()
    {
        return key($this->titles);
    }

    public function next()
    {
        next($this->titles);
    }

    public function rewind()
    {
        reset($this->titles);
    }

    public function valid()
    {
        return false !== current($this->titles);
    }

    protected function getKey($offset)
    {
        if (is_object($offset)) {
            return spl_object_hash($offset);
        } elseif (is_array($offset)) {
            return md5(serialize($offset));
        } else {
            return (string) $offset;
        }
    }

    protected function getTitle($key)
    {
        return isset($this->titles[$key]) ? $this->titles[$key] : null;
    }

    public function add($title, $item)
    {
        if (!isset($this->items[$this->getKey($title)])) {
            $this->items[$this->getKey($title)] = new GroupedItems($title);
        }
        $this->items[$this->getKey($title)]->add($item);
    }

}
