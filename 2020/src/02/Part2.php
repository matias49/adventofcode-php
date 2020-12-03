<?php

namespace Day2;

class Part2
{
    public function Solve()
    {
        echo "Day 2 / Part 2 result : ";
        $file = file(__DIR__."/input.txt");
        if ($file) {
            $nbPasswordsValid = 0;
            foreach ($file as $line) {
                $matches = null;
                preg_match('/(\d+)-(\d+) (\w): (\w+)/m', $line, $matches);
                $string = str_split($matches[4]);
                if (($string[$matches[1] - 1] == $matches[3] && $string[$matches[2] - 1] != $matches[3]) || $string[$matches[1] - 1] != $matches[3] && $string[$matches[2] - 1] == $matches[3]) {
                    $nbPasswordsValid++;
                }
            }
            echo $nbPasswordsValid;
        } else {
            echo "Error reading file.";
        }
        return;
    }

}