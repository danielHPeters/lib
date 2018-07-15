<?php

namespace lib\file;

/**
 * Class File.
 *
 * @package lib\file
 * @author Daniel Peters
 * @version 1.0
 */
class File {
  private $name;
  private $path;
  private $extension;
  private $mimeType;
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
