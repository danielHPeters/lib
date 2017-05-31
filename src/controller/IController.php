<?php

/**
 * © Rafisa Informatik.
 * Alle Rechte Vorbehalten
 */

namespace rafisa\lib\src\controller;

/**
 * Description of IController
 *
 * @author d.peters
 */
class IController {
    
    /**
     * the controller to be used
     */
    public function setController(string $controller);
    
    /**
     * action of the controller
     */
    public function setAction(string $action);
    
    /**
     * The parameters sent to the controller
     */
    public function setParams(array $params);
    
    /**
     * Start the controller
     */
    public function run();
}
