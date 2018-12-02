<?php

namespace Day1;

class Part1 {
    public function Solve(){
        echo "Day 1 / Part 1 result : ";
        $file = fopen(__DIR__."/input.txt", "r");
        $counter = 0;
        if($file){
            while(($line = fgets($file)) !== false){
                $counter += (int) $line;
            }
            echo $counter;
        }
        else {
            echo "Error reading file.";
        }
        return;
    }
}
