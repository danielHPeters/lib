<?php

namespace rafisa\lib\routing;

use rafisa\lib\collections\ArrayList;

/**
 * Description of Request
 *
 * @author  Daniel Peters
 * @version 1.0
 * @package rafisa\lib\routing
 */
class Request
{
    /**
     *
     * @var string
     */
    private $uri;

    /**
     *
     * @var ArrayList
     */
    private $params;

    /**
     * Constructor. Requires the uri of request to be passed.
     * Initializes the params array.
     *
     * @param string $uri request uri
     */
    public function __construct(string $uri)
    {
        $this->uri = $uri;
        $this->params = new ArrayList();
    }

    /**
     *
     * @return string
     */
    public function getUri(): string
    {
        return $this->uri;
    }

    /**
     *
     * @param string $key
     * @param string $value
     */
    public function setParam(string $key, string $value)
    {
        $this->params[$key] = $value;
    }

    /**
     *
     * @param string $key
     *
     * @return string
     */
    public function getParam(string $key): string
    {
        return isset($this->params[$key]) ? $this->params[$key] : '404';
    }

    /**
     *
     * @return ArrayList
     */
    public function getParams(): ArrayList
    {
        return $this->params;
    }
}
