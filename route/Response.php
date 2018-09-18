<?php

namespace lib\route;

use lib\collection\ArrayList;
use lib\collection\IList;
use function header;
use function headers_sent;
use function json_encode;
use function http_response_code;

/**
 * Class Response.
 *
 * @package lib\route
 * @author Daniel Peters <daniel.peters.ch@gmail.com>
 * @version 1.0
 */
class Response {
  /**
   * @var string Http version
   */
  private $version;
  /**
   * @var IList
   */
  private $headers;

  /**
   * @var string Http status code
   */
  private $status;
  /**
   * @var string
   */
  private $body;

  public function __construct (string $version = '1.1', int $status = 200) {
    $this->version = $version;
    $this->headers = new ArrayList();
    $this->status = $status;
    $this->body = '';
  }

  public function send ($data): void {
    $_SERVER['SERVER_PROTOCOL'] = 'HTTP/' . $this->version;
    http_response_code($this->status);

    if ( ! headers_sent()) {
      if (!$this->headers->isEmpty()) {
        $this->headers->each(function ($header) {
          header($header, true);
        });
      } else {
        header('Content-Type: text/html; charset=utf-8', true);
      }
      echo $data;
    }
  }

  /**
   * Transform body data to json and send response.
   *
   * @param array $data
   */
  public function json (array $data): void {
    $_SERVER['SERVER_PROTOCOL'] = 'HTTP/' . $this->version;
    http_response_code($this->status);
    header('Content-Type: application/json; charset=utf-8', true);
    echo json_encode($data);
  }

  public function redirect (string $location): void {
    header('Location: ' . $location);
  }

  public function getHeaders (): ILIst {
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

  public function getBody (): string {
    return $this->body;
  }

  public function setBody (string $body): void {
    $this->body = $body;
  }

  public function appendBody (string $data) {
    $this->body .= $data;
  }
}
