<?php

namespace lib\route;

use lib\collection\ArrayList;
use lib\collection\IList;
use function header;
use function headers_sent;
use function json_encode;

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
   * @var int Http status code
   */
  private $status;
  /**
   * @var string
   */
  private $body;

  public function __construct (string $version = '1.0', int $status = 200) {
    $this->version = $version;
    $this->headers = new ArrayList();
    $this->status = $status;
    $this->body = '';
  }

  public function send (): void {
    if ( ! headers_sent()) {
      $this->headers->each(function ($header) {
        header('HTTP/' . $this->version . ' ' . $header, true, $this->status);
      });
      echo $this->body;
    }
  }

  /**
   * Transform body data to json and send response.
   */
  public function json (): void {
    header('HTTP/' . $this->version . ' Content-Type: application/json; charset=utf-8', true, $this->status);
    echo json_encode($this->body);
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
