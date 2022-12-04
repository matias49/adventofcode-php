<?php

namespace Year2022\Day4;

class Solving {

  /**
   * @param array $data
   *
   * @return int
   */
  public function countIntersections(array $data): int {
    $intersections = 0;
    foreach ($data as $line) {
      $intersection = array_intersect($line[0], $line[1]);
      if ((array_values($intersection) == array_values($line[0])) || (array_values($intersection) == array_values($line[1]))) {
        $intersections++;
      }
    }
    return $intersections;
  }

  /**
   * @param array $data
   *
   * @return int
   */
  public function countOverlaps(array $data): int {
    $overlap = 0;
    foreach ($data as $line) {
      $intersection = array_intersect($line[0], $line[1]);
      if (count($intersection) > 0) {
        $overlap++;
      }
    }
    return $overlap;
  }

}