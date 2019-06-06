<?php

namespace lib\route;

use lib\collection\ListInterface;
use lib\file\MIMEType;

/**
 * Interface Response.
 *
 * @package lib\route
 * @author Daniel Peters
 * @version 1.0
 */
interface Response {
  /**
   * Send response data.
   *
   * @param $data
   * @param string $contentType
   */
  public function send ($data, $contentType = MIMEType::HTML): void;

  public function render (string $view, array $data): void;

  /**
   * Transform body data to json and send response.
   *
   * @param mixed $data
   */
  public function json ($data): void;

  /**
   * @param string $location
   */
  public function redirect (string $location): void;

  /**
   * @return ListInterface
   */
  public function getHeaders (): ListInterface;

  /**
   * @return int
   */
  public function getStatus (): int;

  /**
   * @param int $status
   */
  public function setStatus (int $status): void;
}
