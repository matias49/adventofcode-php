<?php

namespace Day3;

class Part1
{
    public function Solve()
    {
        echo "Day 3 / Part 1 result : ";
        $file = file(__DIR__ . "/input.txt");

        if ($file) {
            $lineLength = strlen(trim(array_shift($file)));
            $char = 0;
            $trees = 0;
            foreach ($file as $line) {
                $array = str_split(trim($line));
                $index = ($char + 3) % $lineLength;
                if ($array[$index] == '#') {
                    $trees++;
                }
                $char += 3;
            }
            echo $trees;
        } else {
            echo "Error reading file.";
        }
        return;
    }
}
