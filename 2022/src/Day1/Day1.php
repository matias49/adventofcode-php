<?php

declare(strict_types=1);

namespace Year2022\Day1;

class Day1 {

  public static function Solve(): void {
    $day = new Day1();
    echo $day->part1() . PHP_EOL;
    echo $day->part2() . PHP_EOL;
  }

  /**
   * @return int
   */
  public function part1(): int {
    $data = $this->getData(__DIR__ . "/input.txt");
    $elfs = $this->calcSum($data);
    rsort($elfs);
    return $elfs[0];
  }

  /**
   * @return array[int][int]
   */
  private function getData(string $path): array {
    $file = file($path, FILE_IGNORE_NEW_LINES);
    $data = [];
    if ($file) {
      $currentElf = [];
      foreach ($file as $line) {
        if (!empty($line)) {
          $currentElf[] = $line;
        }
        else {
          $data[] = $currentElf;
          $currentElf = [];
        }
      }
    }
    return $data;
  }

  /**
   * @param array $data
   *
   * @return array[int]
   */
  private function calcSum(array $data): array {
    $sum = [];
    foreach ($data as $elf) {
      $sum[] = array_sum($elf);
    }
    return $sum;
  }

  /**
   * @return int
   */
  public function part2(): int {
    $data = $this->getData(__DIR__ . "/input.txt");
    $elfs = $this->calcSum($data);
    rsort($elfs);
    return $elfs[0] + $elfs[1] + $elfs[2];
  }

}