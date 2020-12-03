<?php

namespace Day3;

class Part2
{
    public function Solve()
    {
        echo "Day 3 / Part 2 result : ";
        $file = file(__DIR__ . "/input.txt");

        if ($file) {
            echo
                $this->solve_for_slope($file, 1, 1) * $this->solve_for_slope($file, 3, 1) * $this->solve_for_slope($file, 5, 1) * $this->solve_for_slope($file, 7, 1) * $this->solve_for_slope($file, 1, 2);
        } else {
            echo "Error reading file.";
        }
        return;
    }

    //https://www.reddit.com/r/adventofcode/comments/k5qsrk/2020_day_03_solutions/gegsump/
    private function solve_for_slope($coords, $incr_x, $incr_y): int
    {
        $current_coords = array('x' => 0, 'y' => 0);
        $trees = 0;
        while ($current_coords['y'] < (count($coords) - 1)) {
            $current_coords['x'] += $incr_x;
            $current_coords['y'] += $incr_y;

            $current_line = trim($coords[$current_coords['y']]);
            $actual_x = $current_coords['x'] % strlen($current_line);
            if ($current_line[$actual_x] === '#')
                $trees += 1;
        }
        return $trees;
    }
}
