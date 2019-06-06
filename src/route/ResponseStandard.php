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
 * @author Daniel Peters
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

  public function redirect (string $location): void {
    header('Location: ' . $location);
  }

  public function getHeaders (): ListInterface {
    return $this->headers;
  }

  /**
   * @return int
   */
  public function getStatus (): int {
    return $this->status;
  }

  /**
   * @param int $status
   */
  public function setStatus (int $status): void {
    $this->status = $status;
  }

  private function getContentTypeHeader ($contentType): string {
    return "Content-Type: $contentType; charset=$this->charset";
  }
}
