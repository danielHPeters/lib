<?php

namespace rafisa\lib\algorithms\sorting;

/**
 * Description of QuickSort
 *
 * @author  d.peters
 * @version 1.0
 */
abstract class QuickSort
{
    /**
     * Simple quick sort function
     *
     * @param array $arr
     *
     * @return array
     */
    public static function simpleQuickSort(array $arr): array
    {
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

            $sorted = array_merge(self::simpleQuickSort($left), [$pivot], self::simpleQuickSort($right));
        }

        return $sorted;
    }

    /**
     *
     * @param array $arr
     * @param int   $leftIndex
     * @param int   $rightIndex
     *
     * @return int
     */
    private static function partition(array &$arr, int $leftIndex, int $rightIndex): int
    {
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

    /**
     *
     * @param array $arr
     * @param int   $leftIndex
     * @param int   $rightIndex
     */
    public static function inPlaceQuickSort(array &$arr, int $leftIndex, int $rightIndex)
    {
        $index = self::partition($arr, $leftIndex, $rightIndex);

        if ($leftIndex < $index - 1) {
            self::inPlaceQuickSort($arr, $leftIndex, $index - 1);
        }
        if ($index < $rightIndex) {
            self::inPlaceQuickSort($arr, $index, $rightIndex);
        }
    }
}
