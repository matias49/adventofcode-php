<?php

declare(strict_types=1);

namespace Year2022\Day2;

class Day2
{

    const ROCK = ["A", "X"];
    const PAPER = ["B", "Y"];
    const SCISSORS = ["C", "Z"];

    const WIN = "Z";
    const DRAW = "Y";
    const LOSE = "X";

    const ROCK_POINTS = 1;
    const PAPER_POINTS = 2;
    const SCISSORS_POINTS = 3;

    private function isWin(string $round): bool
    {
        return in_array($round, [self::SCISSORS[0] . self::ROCK[1], self::ROCK[0] . self::PAPER[1], self::PAPER[0] . self::SCISSORS[1]]);
    }

    private function isDraw(string $round): bool
    {
        return in_array($round, [self::ROCK[0] . self::ROCK[1], self::PAPER[0] . self::PAPER[1], self::SCISSORS[0] . self::SCISSORS[1]]);
    }


    private function isLoss(string $round): bool
    {
        return in_array($round, [self::SCISSORS[0] . self::PAPER[1], self::ROCK[0] . self::SCISSORS[1], self::PAPER[0] . self::ROCK[1]]);
    }

    public static function Solve(): void
    {
        $day = new Day2();
        echo $day->part1() . PHP_EOL;
        echo $day->part2() . PHP_EOL;
    }

    /**
     * @return int
     */
    public function part1(): int
    {
        $data = $this->getData(__DIR__ . "/input.txt");
        return $this->calcScore($data);
    }

    /**
     * @return array[string]
     */
    private function getData(string $path): array
    {
        $file = file($path, FILE_IGNORE_NEW_LINES);
        array_walk($file, function (&$item, $key) {
            $item = str_replace(' ', '', $item);
        });

        return $file;
    }

    /**
     * @param array $rounds
     * @return int
     */
    private function calcScore(array $rounds): int
    {
        $score = 0;
        foreach ($rounds as $round) {
            if ($this->isWin($round)) {
                $score += 6;
            }
            if ($this->isDraw($round)) {
                $score += 3;
            }
            if ($this->isLoss($round)) {
                $score += 0;
            }
            switch ($round[1]) {
                case self::ROCK[1]:
                    $score += self::ROCK_POINTS;
                    break;
                case self::PAPER[1]:
                    $score += self::PAPER_POINTS;
                    break;
                case self::SCISSORS[1]:
                    $score += self::SCISSORS_POINTS;
                    break;
            }
        }
        return $score;

    }

    /**
     * @param array $rounds
     * @return array
     */
    private function replaceEnd(array $rounds): array
    {
        $data = [];
        foreach ($rounds as $round) {
            switch ($round[1]) {
                case self::WIN:
                    switch ($round[0]) {
                        case self::SCISSORS[0];
                            $data[] = sprintf("%s%s", $round[0], self::ROCK[1]);
                            break;
                        case self::ROCK[0];
                            $data[] = sprintf("%s%s", $round[0], self::PAPER[1]);
                            break;
                        case self::PAPER[0];
                            $data[] = sprintf("%s%s", $round[0], self::SCISSORS[1]);
                            break;
                    }
                    break;
                case self::DRAW:
                    switch ($round[0]) {
                        case self::SCISSORS[0];
                            $data[] = sprintf("%s%s", $round[0], self::SCISSORS[1]);
                            break;
                        case self::ROCK[0];
                            $data[] = sprintf("%s%s", $round[0], self::ROCK[1]);
                            break;
                        case self::PAPER[0];
                            $data[] = sprintf("%s%s", $round[0], self::PAPER[1]);
                            break;
                    }
                    break;
                case self::LOSE:
                    switch ($round[0]) {
                        case self::SCISSORS[0];
                            $data[] = sprintf("%s%s", $round[0], self::PAPER[1]);
                            break;
                        case self::ROCK[0];
                            $data[] = sprintf("%s%s", $round[0], self::SCISSORS[1]);
                            break;
                        case self::PAPER[0];
                            $data[] = sprintf("%s%s", $round[0], self::ROCK[1]);
                            break;
                    }
                    break;

            }
        }
        return $data;
    }

    /**
     * @return int
     */
    public function part2(): int
    {
        $data = $this->getData(__DIR__ . "/input.txt");
        $data = $this->replaceEnd($data);
        return $this->calcScore($data);
    }

}