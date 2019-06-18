<?php

namespace lib\route;

use lib\collection\ArrayList;
use lib\collection\ListInterface;
use lib\file\MIMEType;
use lib\http\Method;
use function file_get_contents;
use function parse_str;
use function parse_url;
use function trim;
use function json_decode;
use const PHP_URL_PATH;

/**
 * Class RequestStandard. Basic implementation of the {@link Request} interface.
 *
 * @package lib\route
 * @author  Daniel Peters
 * @version 1.0
 */
class RequestStandard implements Request {
  /**
   * @var string The request method
   */
  private $method;
  /**
   * @var string The request uri
   */
  private $uri;

  /**
   * @var ListInterface
   */
  private $headers;

  /**
   * @var array The request query parameter array
   */
  private $queryParams;

  /**
   * @var RequestBody
   */
  private $body;

  /**
   * @var array The files array
   */
  private $files;

  public function __construct () {
    $this->method = $_SERVER['REQUEST_METHOD'];
    $this->uri = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');
    $this->headers = new ArrayList();
    $this->queryParams = $_GET;

    // Make sure only POST and PUT requests have a body.
    if ($this->method === Method::POST) {
      $contentType = explode(';', $_SERVER['CONTENT_TYPE'])[0];

      if (isset($contentType) && $contentType === MIMEType::JSON) {
        $this->body = new RequestBodyStandard($contentType, json_decode(file_get_contents('php://input'), true));
      } else {
        $this->body = new RequestBodyStandard($contentType, $_POST);
        $this->files = $_FILES;
      }
    } else if ($this->method === Method::PUT) {
      $putVariables = [];
      $contentType = explode(';', $_SERVER['CONTENT_TYPE'])[0];

      if (isset($contentType) && $contentType === MIMEType::JSON) {
        $putVariables = json_decode(file_get_contents('php://input'), true);
      } else {
        parse_str(file_get_contents('php://input'), $putVariables);
      }
      $this->body = new RequestBodyStandard($contentType, $putVariables);
      $this->files = $_FILES;
    } else {
      $this->body = null;
    }
  }

  /**
   * @return string The request method
   */
  public function getMethod (): string {
    return $this->method;
  }

  /**
   * @return ListInterface The request headers
   */
  public function getHeaders (): ListInterface {
    return $this->headers;
  }

  /**
   * @return string The request uri
   */
  public function getUri (): string {
    return $this->uri;
  }

  /**
   * @return array The request query parameters ( eg. ?value=key )
   */
  public function getQueryParams (): array {
    return $this->queryParams;
  }

  /**
   * @return RequestBody Get the request body object
   */
  public function getBody (): RequestBody {
    return $this->body;
  }

  /**
   * @return array Get the request files array
   */
  public function getFiles (): array {
    return $this->files;
  }
}
