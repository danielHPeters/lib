<?php

namespace lib\file;

use Exception;
use function fclose;
use function filesize;
use function fopen;
use function fwrite;
use function is_file;
use function mime_content_type;
use function realpath;

/**
 * Class File.
 *
 * @package lib\file
 * @author Daniel Peters <daniel.peters.ch@gmail.com>
 * @version 1.0
 */
class File {
  const EOL = "\n";
  const WIN_EOL = "\r\n";

  /**
   * @var resource
   */
  private $resource;

  /**
   * @var string
   */
  private $name;
  /**
   * @var string
   */
  private $path;
  /**
   * @var string
   */
  private $extension;
  /**
   * @var string
   */
  private $mimeType;
  /**
   * @var int
   */
  private $size;

  public function __construct (string $name, string $path, string $extension, string $mimeType, int $size) {
    $this->name = $name;
    $this->path = realpath($path);
    $this->extension = $extension;
    $this->mimeType = $mimeType;
    $this->size = $size;
  }

  /**
   * @param $uri
   *
   * @return File
   * @throws Exception
   */
  public static function fromUri (string $uri): File {
    if ( ! is_file($uri)) {
      throw new Exception('Uri does not point to a file.');
    }

    $parts = pathinfo($uri);
    $name = $parts['filename'];
    $path = realpath($parts['path']);
    $extension = $parts['extension'];
    $mimeType = mime_content_type($uri);
    $size = filesize($uri);

    return new File($name, $path, $extension, $mimeType, $size);
  }

  public function getFullPath (): string {
    return $this->path . '/' . $this->name . '.' . $this->extension;
  }

  public function open (string $mode): void {
    $this->resource = fopen($this->getFullPath(), $mode);
    if ($this->resource === false) {
      throw new Exception('Failed to open file: ' . $this->getFullPath() . '.');
    }
  }

  public function append ($data): void {
    $this->open('a');
    fwrite($this->resource, $data, self::EOL);
  }

  public function close (): void {
    fclose($this->resource);
  }

  public function getName (): string {
    return $this->name;
  }

  public function getPath (): string {
    return $this->path;
  }

  public function getExtension (): string {
    return $this->extension;
  }

  public function getMimeType (): string {
    return $this->mimeType;
  }

  public function getSize (): int {
    return $this->size;
  }
}
