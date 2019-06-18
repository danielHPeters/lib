<?php

namespace lib\route;

use lib\collection\ArrayList;
use lib\collection\ListInterface;
use lib\file\MIMEType;
use lib\http\StatusCode;
use lib\util\Charset;
use lib\view\RenderingEngine;
use function header;
use function http_response_code;
use function json_encode;

/**
 * Class Response.
 *
 * @package lib\route
 * @author  Daniel Peters
 * @version 1.0
 */
class ResponseStandard implements Response {
  const HTTP_HEADER = 'HTTP/';
  const DEFAULT_HTTP_VERSION = '1.1';
  const DEFAULT_ACCESS_CONTROL_HEADER = 'Access-Control-Allow-Origin: *';
  /**
   * @var RenderingEngine
   */
  private $renderingEngine;
  /**
   * @var string Http version
   */
  private $version;
  /**
   * @var ListInterface
   */
  private $headers;

  /**
   * @var string Http status code
   */
  private $status;
  /**
   * @var string Response charset
   */
  private $charset;

  /**
   * ResponseStandard constructor.
   *
   * @param RenderingEngine $renderingEngine Rendering engine used to render html
   * @param string $version                  Initial Http version
   * @param int $status                      Initial http status code
   * @param string $charset                  Initial content charset
   */
  public function __construct (
    RenderingEngine $renderingEngine,
    string $version = self::DEFAULT_HTTP_VERSION,
    int $status = StatusCode::OK,
    string $charset = Charset::UTF_8
  ) {
    $this->renderingEngine = $renderingEngine;
    $this->version = $version;
    $this->headers = new ArrayList();
    $this->headers->add(self::DEFAULT_ACCESS_CONTROL_HEADER);
    $this->status = $status;
    $this->charset = $charset;
  }

  /**
   * @param $data
   * @param string $contentType Content type of data. Defaults to 'text/html'
   */
  public function send ($data, $contentType = MIMEType::HTML): void {
    $_SERVER['SERVER_PROTOCOL'] = self::HTTP_HEADER . $this->version;
    http_response_code($this->status);
    $this->headers->each(function (string $header) { header($header); });
    header($this->getContentTypeHeader($contentType));
    echo $data;
  }

  /**
   * Render a view. Acts as a facade for the internal rendering engine render method.
   *
   * @param string $view The name of the view file
   * @param array $data  Key value pairs used to replace a key in the template with the value
   */
  public function render (string $view, array $data = []): void {
    $this->send($this->renderingEngine->render($view, $data));
  }

  /**
   * Transform body data to json and send response.
   *
   * @param mixed $data
   */
  public function json ($data): void {
    $this->send(json_encode($data), MIMEType::JSON);
  }

  /**
   * Using header('Location $URI') to redirect to another page.
   *
   * @param string $location New location
   */
  public function redirect (string $location): void {
    header('Location: ' . $location);
  }

  /**
   * Get the headers ArrayList.
   *
   * @return ListInterface Current headers (all in string format)
   */
  public function getHeaders (): ListInterface {
    return $this->headers;
  }

  /**
   * @return int The current status code
   */
  public function getStatus (): int {
    return $this->status;
  }

  /**
   * Changes the response status code.
   *
   * @param int $status New status code
   */
  public function setStatus (int $status): void {
    $this->status = $status;
  }

  /**
   * Create and get the content type header.
   *
   * @param string $contentType The content type of the response
   * @return string Generated content-type header
   */
  private function getContentTypeHeader (string $contentType): string {
    return "Content-Type: $contentType; charset=$this->charset";
  }
}
