<?php

namespace Day2;

class Part2 {
    public function Solve(){
        echo "Day 2 / Part 2 result : ";
        $file = fopen(__DIR__."/input.txt", "r");
        $lines = [];
        if($file){
            while(($line = fgets($file)) !== false){
                $lineArr = str_split($line);
                foreach ($lines as $key => $value) {
                    $differenceCount = 0;
                    for($i = 0; $i < count($lineArr); $i++){
                        if($differenceCount > 1){
                            break;
                        }
                        if($lineArr[$i] != $value[$i]){
                            $differenceCount++;
                        }
                    }
                    if($differenceCount == 1){
                        // echo sprintf("%s and %s differs by 1 letter.".PHP_EOL, $line, $value);
                        $stringOk = "";
                        for($i = 0; $i < count($lineArr); $i++){
                            if($lineArr[$i] == $value[$i]){
                                $stringOk.=$lineArr[$i];
                            }
                        }
                        echo sprintf("Similar string is: %s", $stringOk);

                        return;
                    }
                }
                $lines[] = $line;
            }
        }
        else {
            echo "Error reading file.";
        }
        return;
    }

}