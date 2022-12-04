<?php

namespace Year2022\Day4;

class Input {

  /**
   * @param string $path
   *
   * @return array[array]
   */
  public function getData(string $path): array {
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
  }}