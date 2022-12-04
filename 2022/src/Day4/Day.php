<?php

declare(strict_types=1);

namespace Year2022\Day4;

class Day {

  private Input $input;

  private Solving $solving;

  public function __construct() {
    $this->input = new Input();
    $this->solving = new Solving();
  }


  public static function Solve(): void {
    $day = new Day();
    echo $day->part1() . PHP_EOL;
    echo $day->part2() . PHP_EOL;
  }

  /**
   * @return int
   */
  public function part1(): int {
    $data = $this->input->getData(__DIR__ . "/input.txt");
    return $this->solving->countIntersections($data);
  }

  /**
   * @return int
   */
  public function part2(): int {
    $data = $this->input->getData(__DIR__ . "/input.txt");
    return $this->solving->countOverlaps($data);
  }

}