<?php

namespace rafisa\lib\util\socket;

use Exception;
use function socket_bind;
use function socket_close;
use function socket_connect;
use function socket_create;
use function socket_last_error;
use function socket_listen;
use function socket_send;
use function socket_strerror;
use function strlen;

/**
 * Wrapper class for php socket.
 * The socket extension needs to be configured and enabled in php.ini.
 *
 * @package rafisa\lib\util\socket
 * @author  Daniel Peters
 * @version 1.0
 */
class Socket {
  /**
   * @var resource
   */
  private $resource;

  /**
   * Constructor.
   *
   * @param int $domain   @see Domain
   * @param int $type     @see Type
   * @param int $protocol @see Protocol
   *
   * @throws Exception When creation of the socket failed
   */
  public function __construct (int $domain, int $type, int $protocol = 0) {
    $this->resource = socket_create($domain, $type, $protocol);

    if (!$this->resource) {
      $this->handleError('Failed to create the socket');
    }
  }

  /**
   * @param string $message
   *
   * @throws Exception
   */
  private function handleError (string $message): void {
    $err = $this->getLastError();
    throw new Exception($message . ': [' . $err['code'] . '] ' . $err['message']);
  }

  /**
   * @return array
   */
  private function getLastError (): array {
    $errCode = socket_last_error();
    $errMsg = socket_strerror($errCode);

    $err = ['code' => $errCode, 'message' => $errMsg];

    return $err;
  }

  /**
   * @param string $address
   * @param int $port
   *
   * @throws Exception
   */
  public function connectToRemote (string $address, int $port = 80): void {
    $connected = socket_connect($this->resource, $address, $port);

    if (!$connected) {
      $this->handleError('Could not connect to ' . $address);
    }
  }

  /**
   * @param string $address
   * @param int $port
   *
   * @throws Exception
   */
  public function bind (string $address = '127.0.0.1', int $port = 5000): void {
    $bound = socket_bind($this->resource, $address, $port);

    if (!$bound) {
      $this->handleError('Failed to bind socket');
    }
  }

  /**
   * @param int $backlog
   * @throws Exception
   */
  public function listen (int $backlog = 10): void {
    $listening = socket_listen($this->resource, $backlog);

    if ($listening) {
      $this->handleError('Could not start listening.');
    }
  }

  /**
   * @param $data
   * @param int $flags
   *
   * @throws Exception
   */
  public function send ($data, int $flags = 0): void {
    $sent = socket_send($this->resource, $data, strlen($data), $flags);

    if (!$sent) {
      $this->handleError('Failed to send data');
    }
  }

  /**
   * Close the socket.
   */
  public function close (): void {
    socket_close($this->resource);
  }
}
