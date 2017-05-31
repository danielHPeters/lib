<?php

/**
 * © Rafisa Informatik.
 * Alle Rechte Vorbehalten
 */

namespace rafisa\lib\src\routing;

/**
 * Description of Request
 *
 * @author d.peters
 */
class Request {
    
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


    public function __construct(string $uri) {
        
        $this->uri = $uri;
        $this->params = [];
    }
    
    /**
     * 
     * @return string
     */
    public function getUri() : string {
        return $this->uri;
    }
    
    
    public function setParam(string $key, string $value){
        $this->params[$key] = $value;
    }
    
    public function getParam(string $key) : string{

        return isset($this->params[$key]) ? $this->params[$key] : '404';
    }
    
    public function getParams() : array {
        return $this->params;
    }
    
}
