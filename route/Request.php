<?php

namespace lib\route;

use lib\collection\ArrayList;
use lib\collection\IList;
use lib\http\Method;
use function trim;
use function parse_url;
use function parse_str;
use function file_get_contents;
use const PHP_URL_PATH;
use const INPUT_POST;

/**
 * Class Request.
 *
 * @package lib\route
 * @author Daniel Peters <daniel.peters.ch@gmail.com>
 * @version 1.0
 */
class Request {
  /**
   * @var string The request method
   */
  private $method;
  /**
   * @var string
   */
  private $uri;

  /**
   * @var IList
   */
  private $headers;

  /**
   * @var array
   */
  private $params;

  /**
   * @var array
   */
  private $body;

  public function __construct () {
    $this->method = $_SERVER['REQUEST_METHOD'];
    $this->uri = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');
    $this->headers = new ArrayList();
    $this->params = $_GET;

    if ($this->method === Method::POST) {
      $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
      $this->body = $post ? $post : [];
    } else if ($this->method === Method::PUT) {
      $put = [];
      parse_str(file_get_contents('php://input'), $put);
      $put = filter_var_array($put, FILTER_SANITIZE_STRING);
      $this->body = $put ? $put : [];
    }
  }

  public function getMethod (): string {
    return $this->method;
  }

  public function getHeaders (): IList {
    return $this->headers;
  }

  public function getUri (): string {
    return $this->uri;
  }

  public function setUri (string $uri): void {
    $this->uri = $uri;
  }

  public function getParams (): array {
    return $this->params;
  }

  public function getBody (): array {
    return $this->body;
  }
}
