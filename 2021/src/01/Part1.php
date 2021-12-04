<?php

namespace Day1;

class Part1
{
    public function solve() {
        echo "Day 3 / Part 1 result : ";
        $file = file(__DIR__ . "/input.txt");
        if ($file) {
            $count = 0;
            $v1 = array_shift($file);
            foreach ($file as $v2) {
                if ($v2 > $v1) {
                    $count++;
                }
                $v1 = $v2;
            }
            echo $count;
        } else {
            echo "Error reading file.";
        }
        return;
    }
}

$d1 = new Part1();
$d1->solve();