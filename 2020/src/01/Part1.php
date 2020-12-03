<?php

namespace Day1;

class Part1
{
    public function Solve()
    {
        echo "Day 1 / Part 1 result : ";
        $file = file(__DIR__ . "/input.txt");
        if ($file) {
            foreach ($file as $x) {
                foreach ($file as $y) {
                    if ($x + $y == 2020) {
                        echo $x * $y;
                        return;
                    }
                }
            }
        } else {
            echo "Error reading file.";
        }
    }
}
