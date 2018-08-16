<?php

namespace lib\route;

use lib\collection\ArrayList;
use lib\collection\HashMap;
use lib\collection\Map;

/**
 * Class Request.
 *
 * @package lib\route
 * @author  Daniel Peters
 * @version 1.0
 */
class Request {
  /**
   * @var string The request method
   */
  private $method;
  /**
   * @var ArrayList
   */
  private $headers;
  /**
   * @var string
   */
  private $uri;
  /**
   * @var Map
   */
  private $body;

  /**
   * Request constructor.
   *
   * @param string $method Request method
   * @param string $uri Request uri
   */
  public function __construct(string $method, string $uri) {
    $this->method  = $method;
    $this->headers = new ArrayList();
    $this->uri     = $uri;
    $this->body    = new HashMap();
  }

  public function getMethod(): string {
    return $this->method;
  }

  public function getHeaders(): ArrayList {
    return $this->headers;
  }

  public function getUri(): string {
    return $this->uri;
  }

  public function setUri(string $uri): void {
    $this->uri = $uri;
  }

  public function getBody(): Map {
    return $this->body;
  }
}
