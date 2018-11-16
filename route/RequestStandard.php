<?php

namespace lib\route;

use lib\collection\ArrayList;
use lib\collection\ListInterface;
use lib\http\Method;
use function file_get_contents;
use function parse_str;
use function parse_url;
use function trim;
use const PHP_URL_PATH;

/**
 * Class Request.
 *
 * @package lib\route
 * @author Daniel Peters <daniel.peters.ch@gmail.com>
 * @version 1.0
 */
class RequestStandard implements Request {
  /**
   * @var string The request method
   */
  private $method;
  /**
   * @var string
   */
  private $uri;

  /**
   * @var ListInterface
   */
  private $headers;

  /**
   * @var array
   */
  private $queryParams;

  /**
   * @var array
   */
  private $body;

  public function __construct () {
    $this->method = $_SERVER['REQUEST_METHOD'];
    $this->uri = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');
    $this->headers = new ArrayList();
    $this->queryParams = $_GET;

    // Make sure only POST and PUT requests have a body.
    if ($this->method === Method::POST) {
      $this->body = $_POST;
    } else if ($this->method === Method::PUT) {
      parse_str(file_get_contents('php://input'), $this->body);
    } else {
      $this->body = [];
    }
  }

  public function getMethod (): string {
    return $this->method;
  }

  public function getHeaders (): ListInterface {
    return $this->headers;
  }

  public function getUri (): string {
    return $this->uri;
  }

  public function getQueryParams (): array {
    return $this->queryParams;
  }

  public function getBody (): array {
    return $this->body;
  }
}
