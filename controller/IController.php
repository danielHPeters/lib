<?php

namespace rafisa\lib\controller;

/**
 * Description of IController
 *
 * @author  d.peters
 * @version 1.0
 */
interface IController
{
    /**
     * the controller to be used
     *
     * @param string $controller
     */
    public function setController(string $controller);

    /**
     * action of the controller
     *
     * @param string $action
     */
    public function setAction(string $action);

    /**
     * The parameters sent to the controller
     *
     * @param array $params
     */
    public function setParams(array $params);

    /**
     * Start the controller
     */
    public function run();
}
