<?php

/**
 * © Rafisa Informatik.
 * Alle Rechte Vorbehalten
 */

namespace rafisa\lib\src\routing;

/**
 * Description of Route
 *
 * @author d.peters
 */
class Route {

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
    public function __construct(string $path, string $controllerClass) {
        $this->path = $path;
        $this->controllerClass = $controllerClass;
    }

    /**
     * 
     * @param Request $request
     * @return bool
     */
    public function match(Request $request): bool {
        return $this->path === $request->getUri();
    }

    /**
     * 
     * @return string
     */
    public function createController(): string {
        return new $this->controllerClass;
    }

}
