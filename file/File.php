<?php

namespace lib\file;

/**
 * Class File.
 *
 * @package lib\file
 * @author Daniel Peters <daniel.peters.ch@gmail.com>
 * @version 1.0
 */
class File {
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
    $this->path = $path;
    $this->extension = $extension;
    $this->mimeType = $mimeType;
    $this->size = $size;
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
