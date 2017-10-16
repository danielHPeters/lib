<?php

namespace rafisa\lib\routing;

/**
 * Description of Route
 *
 * @author  d.peters
 * @version 1.0
 */
class Route
{
    /**
     *
     * @var string
     */
    private $path;

    /**
     *
     * @var string
     */
    private $controllerClass;

    /**
     *
     * @param string $path
     * @param string $controllerClass
     */
    public function __construct(string $path, string $controllerClass)
    {
        $this->path = $path;
        $this->controllerClass = $controllerClass;
    }

    /**
     *
     * @param Request $request
     *
     * @return bool
     */
    public function match(Request $request): bool
    {
        return $this->path === $request->getUri();
    }

    /**
     *
     * @return IController
     */
    public function createController(): IController
    {
        return new $this->controllerClass;
    }
}
