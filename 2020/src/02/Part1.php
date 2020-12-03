<?php

namespace Day2;

class Part1 {
    public function Solve(){
        echo "Day 2 / Part 1 result : ";
        $file = file(__DIR__."/input.txt");

        if($file){
            $nbPasswordsValid = 0;
            foreach ($file as $line) {
                $matches = null;
                preg_match('/(\d+)-(\d+) (\w): (\w+)/m', $line, $matches);
                $letterCount = substr_count($matches[4], $matches[3]);
                if ($letterCount >= $matches[1] && $letterCount <= $matches[2]) {
                        $nbPasswordsValid++;
                }
            }
            echo $nbPasswordsValid;
        }
        else {
            echo "Error reading file.";
        }
        return;
    }
}