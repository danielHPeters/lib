<?php

/**
 * © Rafisa Informatik.
 * Alle Rechte Vorbehalten
 */

namespace rafisa\lib\src\observer;

/**
 *
 * @author d.peters
 */
interface IObserver
{
    function update(Observable $obj, $args = null);
}
