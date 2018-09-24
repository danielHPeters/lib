<?php

namespace lib\route;

use lib\collection\ArrayList;
use lib\collection\IList;
use lib\file\MIMEType;
use lib\util\Charset;
use function header;
use function http_response_code;
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
   * @var string Http status code
   */
  private $status;
  /**
   * @var string Response charset
   */
  private $charset;

  public function __construct (string $version = '1.1', int $status = 200, string $charset = Charset::UTF_8) {
    $this->version = $version;
    $this->headers = new ArrayList();
    $this->status = $status;
    $this->charset = $charset;
  }

  public function send ($data, $contentType = MIMEType::HTML): void {
    $_SERVER['SERVER_PROTOCOL'] = 'HTTP/' . $this->version;
    http_response_code($this->status);

    if ( ! $this->headers->isEmpty()) {
      $this->headers->each(function (string $header) { header($header, true); });
    } else {
      header("Content-Type: $contentType; charset=$this->charset", true);
    }
    echo $data;
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
}
