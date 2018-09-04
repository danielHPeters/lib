<?php

namespace lib\math;

use Exception;
use function count;

/**
 * Class Matrix.
 *
 * @package lib\math
 * @author Daniel Peters <daniel.peters.ch@gmail.com>
 * @version 1.0
 */
class Matrix {
  /**
   * @var array
   */
  private $arr;
  /**
   * @var int
   */
  private $rows;
  /**
   * @var int
   */
  private $columns;

  public function __construct (array $arr) {
    $this->arr = $arr;
    $this->rows = count($arr);
    $this->rows = count($arr[0]);
  }

  /**
   * Set the matrix to another array.
   *
   * @param array $arr Matrix array
   *
   * @throws Exception When matrix array is not correctly formed (eg. some rows are longer than others)
   */
  public function set (array $arr) {
    $columns = count($arr);
    $rowLength = count($arr[0]);
    $valid = true;
    for ($i = 1; $i < $columns; $i++) {
      if (count($arr[ $i ]) !== $rowLength) {
        $valid = false;
      }
    }
    if ($valid) {
      $this->rows = $columns;
      $this->columns = count($arr[0]);
      $this->arr = $arr;
    } else {
      throw new Exception('The passed matrix array is malformed: ' . $arr);
    }
  }
}
