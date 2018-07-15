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
  private $params;

  public function __construct (string $uri) {
    $this->headers = new ArrayList();
    $this->uri = $uri;
    $this->params = new HashMap();
  }

  public function getHeaders (): ArrayList {
    return $this->headers;
  }

  public function getUri (): string {
    return $this->uri;
  }

  public function setUri (string $uri): void {
    $this->uri = $uri;
  }

  public function getParams (): Map {
    return $this->params;
  }
}
