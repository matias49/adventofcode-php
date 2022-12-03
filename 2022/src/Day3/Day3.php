<?php

declare(strict_types=1);

namespace Year2022\Day3;

class Day3 {

  private array $priority;

  /**
   */
  public function __construct() {
    $this->priority = array_merge(range('a', 'z'), range('A', 'Z'));
  }

  public static function Solve(): void {
    $day = new Day3();
    echo $day->part1() . PHP_EOL;
    echo $day->part2() . PHP_EOL;
  }

  /**
   * @return int
   */
  public function part1(): int {
    $data = $this->getData(__DIR__ . "/input.txt");
    $sacks = $this->getSacks($data);
    $items = $this->getItems($sacks);
    return $this->getPrioritySum($items);
  }

  /**
   * @return array[array]
   */
  private function getData(string $path): array {
    return file($path, FILE_IGNORE_NEW_LINES);
  }

  /**
   * @param array $data
   *
   * @return array
   */
  public function getSacks(array $data): array {
    $sacks = [];
    foreach ($data as $line) {
      $length = strlen($line);
      $sacks[] = str_split($line, $length / 2);
    }
    return $sacks;
  }

  /**
   * @param array $data
   *
   * @return array
   */
  private function getItems(array $data): array {
    $items = [];

    foreach ($data as $rack) {
      foreach (str_split($rack[0]) as $letter) {
        if (str_contains($rack[1], $letter)) {
          $items[] = $letter;
          break;
        }
      }
    }
    return $items;
  }

  private function getPrioritySum(array $items) {
    $sum = 0;
    foreach ($items as $item) {
      $sum += (array_search($item, $this->priority) + 1);
    }
    return $sum;
  }

  /**
   * @return int
   */
  public function part2(): int {
    $data = $this->getData(__DIR__ . "/input.txt");
    $groups = $this->getGroups($data);
    $priorities = $this->getGroupPriority($groups);
    return $this->getPrioritySum($priorities);
  }

  public function getGroups(array $data): array {
    $groups = [];
    while (!empty($data)) {
      $groups[] = array_splice($data, 0, 3);
    }
    return $groups;
  }

  /**
   * @param array $groups
   *
   * @return array
   */
  private function getGroupPriority(array $groups): array {
    $priorities = [];
    foreach ($groups as $group) {
      $split = [];
      foreach ($group as $line) {
        $split[] = str_split($line);
      }
      $priorities[] = call_user_func_array('array_intersect', $split);
    }
    array_walk($priorities, function (&$item) {
      $item = reset($item);
    });
    return $priorities;
  }

}