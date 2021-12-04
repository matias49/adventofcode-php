<?php

namespace Day1;

class Part2
{
    public function solve() {
        echo "Day 3 / Part 2 result : ";
        $file = file(__DIR__ . "/input.txt");
        if ($file) {
            $count = 0;
            for($i = 0; $i <= count($file) -4 ; $i++) {
                $va = $file[$i];
                $vb = $file[$i + 1];
                $vc = $file[$i + 2];
                $vd = $file[$i + 3];
                if($va + $vb + $vc < $vb + $vc + $vd) {
                    $count++;
                }
            }
            echo $count;
        } else {
            echo "Error reading file.";
        }
        return;
    }
}

$d1 = new Part2();
$d1->solve();