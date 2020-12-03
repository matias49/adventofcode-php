<?php

namespace Day1;

class Part2
{
    public function Solve()
    {
        echo "Day 1 / Part 1 result : ";
        $file = file(__DIR__ . "/input.txt");
        if ($file) {
            foreach ($file as $x) {
                foreach ($file as $y) {
                    foreach ($file as $z) {
                        if ($x + $y + $z == 2020) {
                            echo $x * $y * $z;
                            return;
                        }
                    }
                }
            }
        } else {
            echo "Error reading file.";
        }
    }
}

