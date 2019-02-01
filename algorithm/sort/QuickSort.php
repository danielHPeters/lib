<?php

namespace lib\algorithm\sort;

use function array_merge;
use function count;

/**
 * Class QuickSort.
 *
 * @package lib\algorithm\sort
 * @author Daniel Peters
 * @version 1.0
 */
abstract class QuickSort {
  public static function sort (array $arr): array {
    if (count($arr) <= 1) {
      $sorted = $arr;
    } else {
      $pivot = $arr[0];
      $left = [];
      $right = [];

      for ($i = 1; $i < count($arr); $i++) {
        $current = $arr[$i];

        if ($current < $pivot) {
          $left[] = $current;
        } else {
          $right[] = $current;
        }
      }

      $sorted = array_merge(self::sort($left), [$pivot], self::sort($right));
    }

    return $sorted;
  }

  private static function partition (array &$arr, int $leftIndex, int $rightIndex): int {
    $pivot = $arr[($leftIndex + $rightIndex) / 2];

    while ($leftIndex <= $rightIndex) {
      while ($arr[$leftIndex] < $pivot) {
        $leftIndex++;
      }

      while ($arr[$rightIndex] > $pivot) {
        $rightIndex--;
      }

      if ($leftIndex <= $rightIndex) {
        $tmp = $arr[$leftIndex];
        $arr[$leftIndex] = $arr[$rightIndex];
        $arr[$rightIndex] = $tmp;
        $leftIndex++;
        $rightIndex--;
      }
    }

    return $leftIndex;
  }

  public static function sortInPlace (array &$arr, int $leftIndex, int $rightIndex): void {
    $index = self::partition($arr, $leftIndex, $rightIndex);

    if ($leftIndex < $index - 1) {
      self::sortInPlace($arr, $leftIndex, $index - 1);
    }
    if ($index < $rightIndex) {
      self::sortInPlace($arr, $index, $rightIndex);
    }
  }
}
