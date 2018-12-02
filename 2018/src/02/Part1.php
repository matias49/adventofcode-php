<?php

namespace Day2;

class Part1 {
    public function Solve(){
        echo "Day 2 / Part 1 result : ";
        $file = fopen(__DIR__."/input.txt", "r");
        $two = 0;
        $three = 0;
        if($file){
            while(($line = fgets($file)) !== false){
                $foundTwo = false;
                $foundThree = false;
                foreach (count_chars($line, 1) as $i => $val) {
                    if($val == 2 && !$foundTwo){
                        $two++;
                        $foundTwo = true;
                    }
                    if($val == 3 && !$foundThree){
                        $three++;
                        $foundThree = true;
                    }
                 }
            }
            echo sprintf("%d", $two * $three);
        }
        else {
            echo "Error reading file.";
        }
        return;
    }
}