<?php

namespace rafisa\lib\observer;

/**
 *
 * @author  d.peters
 * @version 1.0
 */
interface IObserver
{
    public function update(Observable $obj, $args = null);
}
