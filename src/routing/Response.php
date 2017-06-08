<?php

/**
 * © Rafisa Informatik.
 * Alle Rechte Vorbehalten
 */

namespace rafisa\lib\src\routing;

use rafisa\lib\src\collections\ArrayList;

/**
 * Description of Response
 *
 * @author d.peters
 */
class Response {

    /**
     *
     * @var string
     */
    private $version;

    /**
     *
     * @var ArrayList
     */
    private $headers;

    /**
     * 
     * @param string $version
     */
    public function __construct(string $version) {
        $this->version = $version;
        $this->headers = new ArrayList();
    }

    /**
     * 
     * @return string
     */
    public function getVersion(): string {
        return $this->version;
    }

    /**
     * 
     * @return ArrayList
     */
    public function getHeaders(): ArrayList {
        return $this->headers;
    }

    /**
     * 
     */
    public function send() {

        if (!headers_sent()) {
            $this->headers->each(function($header) {
                header($this->version . ' ' . $header, true);
            });
        }
    }

}
