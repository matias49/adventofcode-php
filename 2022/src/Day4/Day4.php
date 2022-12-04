<?php

declare(strict_types=1);

namespace Year2022\Day4;

class Day4 {

  public static function Solve(): void {
    $day = new Day4();
    echo $day->part1() . PHP_EOL;
    echo $day->part2() . PHP_EOL;
  }

  /**
   * @return int
   */
  public function part1(): int {
    $data = $this->getData(__DIR__ . "/input.txt");
    return $this->countIntersections($data);
  }

  /**
   * @return array[array]
   */
  private function getData(string $path): array {
    $file = file($path, FILE_IGNORE_NEW_LINES);
    $data = [];
    foreach ($file as $line) {
      preg_match_all('/(\d+)-(\d+),(\d+)-(\d+)/', $line, $matches, PREG_SET_ORDER);
      $data[] = [
        range($matches[0][1], $matches[0][2]),
        range($matches[0][3], $matches[0][4]),
      ];
    }
    return $data;
  }

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
   * @return int
   */
  public function part2(): int {
    $data = $this->getData(__DIR__ . "/input.txt");
    return $this->countOverlaps($data);
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