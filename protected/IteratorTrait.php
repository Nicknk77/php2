<?php

namespace App;

trait IteratorTrait
{
    function rewind() {
        return reset($this->data);
    }
    function current() {
        return current($this->data);
    }
    function key() {
        return key($this->data);
    }
    function next() {
        return next($this->data);
    }
    function valid() {
        return key($this->data) !== null;
    }
}