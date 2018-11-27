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
 * @author Daniel Peters
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
   * @var RequestBody
   */
  private $body;

  /**
   * @var array
   */
  private $files;

  public function __construct () {
    $this->method = $_SERVER['REQUEST_METHOD'];
    $this->uri = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');
    $this->headers = new ArrayList();
    $this->queryParams = $_GET;

    // Make sure only POST and PUT requests have a body.
    if ($this->method === Method::POST) {
      $this->body = new RequestBodyStandard($_POST);
      $this->files = $_FILES;
    } else if ($this->method === Method::PUT) {
      $putVariables = [];
      parse_str(file_get_contents('php://input'), $putVariables);
      $this->body = new RequestBodyStandard($putVariables);
      $this->files = $_FILES;
    } else {
      $this->body = null;
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

  public function getBody (): RequestBody {
    return $this->body;
  }

  public function getFiles (): array {
    return $this->files;
  }
}
