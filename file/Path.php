<?php

namespace lib\file;

use lib\collection\ArrayList;
use lib\collection\ListInterface;
use Exception;
use function fclose;
use function filesize;
use function fopen;
use function fwrite;
use function is_file;
use function mime_content_type;
use function realpath;
use function mkdir;
use function glob;
use function rtrim;
use function opendir;
use function is_resource;
use function array_diff;

/**
 * Class File.
 *
 * @package lib\file
 * @author Daniel Peters
 * @version 1.0
 */
class Path {
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

  private function __construct (string $name, string $path, int $size, string $extension = '', string $mimeType = '') {
    $this->name = $name;
    $this->path = realpath($path);
    $this->extension = $extension;
    $this->mimeType = $mimeType;
    $this->size = $size;
  }

  /**
   * Based on https://gist.github.com/eusonlito/5099936.
   *
   * @param string $dir The directory to get the size from.
   *
   * @return int size of a the folder
   */
  private static function calculateFolderSize (string $dir) {
    $size = 0;
    foreach (glob(rtrim($dir, '/') . '/*', GLOB_NOSORT) as $each) {
      $size += is_file($each) ? filesize($each) : self::calculateFolderSize($each);
    }

    return $size;
  }

  /**
   * @param string $uri
   *
   * @return Path
   * @throws Exception
   */
  public static function createDirectoryFromUri (string $uri): Path {
    if ( ! is_dir($uri)) {
      mkdir($uri);
    }

    $parts = pathinfo(realpath($uri));
    $name = $parts['basename'];
    $path = realpath($parts['dirname']);
    $size = self::calculateFolderSize($uri);

    return new Path($name, $path, $size);
  }

  /**
   * @param string $uri
   *
   * @return Path
   * @throws Exception
   */
  public static function createFileFromUri (string $uri): Path {
    if ( ! is_file($uri)) {
      $filePointer = fopen($uri, 'w');
      fclose($filePointer);
    }

    $parts = pathinfo(realpath($uri));
    $name = $parts['filename'];
    $path = realpath($parts['dirname']);
    $extension = $parts['extension'];
    $mimeType = mime_content_type($uri);
    $size = filesize($uri);

    return new Path($name, $path, $size, $extension, $mimeType);
  }

  public function open (string $mode): void {
    if ( ! is_resource($this->resource)) {
      if ($this->isFile()) {
        $this->resource = fopen($this->getFullPath(), $mode);
      } else if ($this->isDirectory()) {
        $this->resource = opendir($this->getFullPath());
      }

      if ( ! $this->resource) {
        throw new Exception('Failed to open file: ' . $this->getFullPath() . '.');
      }
    }
  }

  public function delete (): bool {
    return unlink($this->getFullPath());
  }

  public function exists () {
    return file_exists($this->getFullPath());
  }

  public function isFile (): bool {
    return is_file($this->getFullPath());
  }

  public function isDirectory (): bool {
    return is_dir($this->getFullPath());
  }

  public function getFullPath (): string {
    return $this->path . '/' . $this->name . (! empty($this->extension) ? '.' . $this->extension : '');
  }

  public function append ($data): void {
    if ($this->isFile()) {
      fwrite($this->resource, $data . self::EOL);
    }
  }

  public function getChildPaths (int $order = null): ListInterface {
    $children = new ArrayList();

    if ($this->isDirectory()) {
      $children->addAll(array_diff(scandir($this->getFullPath(), $order), ['.', '..']));
    }

    return $children;
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
