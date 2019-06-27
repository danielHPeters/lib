<?php

namespace lib\route;

use function Couchbase\defaultDecoder;
use lib\collection\ArrayList;
use lib\collection\ListInterface;
use lib\file\MIMEType;
use lib\http\Method;
use function file_get_contents;
use function filter_input;
use function parse_str;
use function parse_url;
use function trim;
use function json_decode;
use function in_array;
use const PHP_URL_PATH;
use const INPUT_SERVER;

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
    $this->method = filter_input(INPUT_SERVER, 'REQUEST_METHOD');
    $this->uri = trim(parse_url(filter_input(INPUT_SERVER, 'REQUEST_URI'), PHP_URL_PATH), '/');
    $this->headers = new ArrayList();
    $this->queryParams = $_GET;
    $this->body = null;
    $this->files = null;

    // Make sure only POST and PUT requests have a body.
    if (in_array($this->method, [Method::POST, Method::PATCH, Method::PUT])) {
      $this->initializeRequestBody();
    }
  }

  private function initializeRequestBody (): void {
    $requestData = [];
    $contentType = explode(';', filter_input(INPUT_SERVER, 'CONTENT_TYPE'))[0];

    if (isset($contentType) && $contentType === MIMEType::JSON) {
      $requestData = json_decode(file_get_contents('php://input'), true);
    } else {
      switch ($this->method) {
        case Method::POST:
          $requestData = $_POST;
          break;
        case Method::PATCH:
        case Method::PUT:
          parse_str(file_get_contents('php://input'), $requestData);
      }
    }

    $this->body = new RequestBodyStandard($contentType, $requestData);
    $this->files = $_FILES;
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
