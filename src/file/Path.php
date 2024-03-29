<?php

namespace lib\file;

use lib\collection\ArrayList;
use lib\collection\ListInterface;
use Exception;
use function array_diff;
use function fclose;
use function filesize;
use function fopen;
use function fwrite;
use function glob;
use function is_file;
use function is_resource;
use function mime_content_type;
use function mkdir;
use function opendir;
use function pathinfo;
use function preg_replace;
use function realpath;
use function rtrim;
use function scandir;
use function str_replace;
use function strtolower;
use function unlink;
use const GLOB_NOSORT;
use const PATHINFO_DIRNAME;
use const PATHINFO_EXTENSION;
use const PATHINFO_FILENAME;

/**
 * Class Path. Wrapper class for files and directories.
 *
 * @package lib\file
 * @author Daniel Peters
 * @version 1.0
 */
class Path {
  /**
   * End of line marker used by both linux and most modern macs.
   * Most text editors can read it nowadays anyway, so use this as your default.
   */
  const EOL = "\n";
  /**
   * Default end of line marker used by windows.
   * Avoid if you can, because it requires two chars and uses mores space.
   */
  const WIN_EOL = "\r\n";
  /**
   * Some older macs use the carriage return character as end of line marker.
   * Only use if necessary.
   */
  const MAC_OLD = "\r";

  const DOT = '.';
  const SLASH = '\\';

  const MODE_APPEND = 'a';
  const MODE_WRITE = 'w';

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

  /**
   * Path constructor.
   * @param  string  $name
   * @param  string  $path
   * @param  int  $size
   * @param  string  $extension
   * @param  string  $mimeType
   */
  private function __construct (string $name, string $path, int $size, string $extension = '', string $mimeType = '') {
    $this->name = $name;
    $this->path = realpath($path);
    $this->extension = $extension;
    $this->mimeType = $mimeType;
    $this->size = $size;
  }

  /**
   * Calculate the folder size.
   * Based on https://gist.github.com/eusonlito/5099936.
   *
   * @param  string  $dir  The directory to get the size from.
   *
   * @return int size of a the folder
   */
  private static function calculateFolderSize (string $dir) {
    $size = 0;

    if (is_dir($dir)) {
      foreach (glob(rtrim($dir, '/') . '/*', GLOB_NOSORT) as $each) {
        $size += is_file($each) ? filesize($each) : self::calculateFolderSize($each);
      }
    }

    return $size;
  }

  /**
   * Pass an URI string which then gets converted into a Path object.
   * Creates the directory if it does not exist.
   *
   * @param  string  $uri  The URI
   *
   * @return Path
   * @throws Exception
   */
  public static function createDirectoryFromUri (string $uri): Path {
    if (!is_dir($uri)) {
      mkdir($uri);
    }

    $parts = pathinfo(realpath($uri));
    $name = $parts['basename'];
    $path = realpath($parts['dirname']);
    $size = self::calculateFolderSize($uri);

    return new Path($name, $path, $size);
  }

  /**
   * Pass an URI string which then gets converted into a Path object.
   * Creates the file if it does not exist.
   *
   * @param  string  $uri  The URI
   *
   * @return Path
   * @throws Exception
   */
  public static function createFileFromUri (string $uri): Path {
    if (!is_file($uri) && !is_dir($uri)) {
      $filePointer = fopen($uri, self::MODE_WRITE);
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

  /**
   * Normalize file names to lower case and convert accent and umlaut characters to ascii conforming characters.
   * Also removes any special characters except "-".
   *
   * @param  string  $fileName  Can be a full path or only file name.
   * @return string The normalized file name including full path.
   */
  public static function normalizeFileName (string $fileName): string {
    $filterChars = ['ä', 'ö', 'ü', 'ß', 'è', 'é', 'à'];
    $replace = ['ae', 'oe', 'ue', 'ss', 'e', 'e', 'a'];
    $path = pathinfo($fileName, PATHINFO_DIRNAME);
    // Make filename lowercase and replace all accent and umlaut characters to conform to ascii alphabet
    $normalizedFileName = str_replace($filterChars, $replace, strtolower(pathinfo($fileName, PATHINFO_FILENAME)));
    // Replace all characters which are not alphanumeric or a "-".
    $normalizedFileName = preg_replace('/[^a-z\d-]+/', '-', $normalizedFileName);
    $normalizedExtension = self::normalizeFileExtension(pathinfo($fileName, PATHINFO_EXTENSION));

    return $path . self::SLASH . $normalizedFileName . self::DOT . $normalizedExtension;
  }

  /**
   * Normalize file extension to lower case and change jpeg to jpg.
   *
   * @param  string  $fileExtension  The file extension
   * @return string The normalized file extension
   */
  public static function normalizeFileExtension (string $fileExtension): string {
    $normalizedExtension = strtolower($fileExtension);

    if ($normalizedExtension === FileExtension::JPEG) {
      $normalizedExtension = FileExtension::JPG;
    }

    return $normalizedExtension;
  }

  /**
   * @param  string  $mode
   * @throws Exception
   */
  public function open (string $mode): void {
    if (!is_resource($this->resource)) {
      if ($this->isFile()) {
        $this->resource = fopen($this->getFullPath(), $mode);
      } elseif ($this->isDirectory()) {
        $this->resource = opendir($this->getFullPath());
      }

      if (!$this->resource) {
        throw new Exception('Failed to open file: ' . $this->getFullPath() . '.');
      }
    }
  }

  public function delete (): bool {
    return unlink($this->getFullPath());
  }

  public function exists (): bool {
    return file_exists($this->getFullPath());
  }

  public function isFile (): bool {
    return is_file($this->getFullPath());
  }

  public function isDirectory (): bool {
    return is_dir($this->getFullPath());
  }

  public function getFullPath (): string {
    return $this->path . '/' . $this->name . (!empty($this->extension) ? '.' . $this->extension : '');
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
