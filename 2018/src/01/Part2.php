<?php
namespace Day1;

class Part2 {
    public function Solve(){
        echo "Day 1 / Part 2 result : ";
        $counter = 0;
        $while = 0;
        $results = [];
        while(true){
            $while++;
            $file = fopen(__DIR__."/input.txt", "r");
            if($file){
                while(($line = fgets($file)) !== false){
                    $counter += (int) $line;
                    if ( in_array($counter, $results) ) {
                        echo sprintf("%d found twice. %d iterations. %d numbers stored in array.", $counter, $while, count($results));
                        return;
                    }
                    $results[] = $counter;
                }
            }
            else {
                echo "Error reading file.";
                return;
            }
        }
    }
}

