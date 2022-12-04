<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use Year2022\Day4\Input;

class InputTest extends TestCase
{

    public function testGetData()
    {
        $input = new Input();
        $data = $input->getData(__DIR__ . "/input.txt");
        $range1 = [range(2,4), range(6,8)];
        $range2 = [range(2,3), range(4,5)];
        $range3 = [range(5,7), range(7,9)];
        $range4 = [range(2,8), range(3,7)];
        $range5 = [range(6,6), range(4,6)];
        $range6 = [range(2,6), range(4,8)];
        $this->assertEquals([$range1, $range2, $range3, $range4, $range5, $range6], $data);
    }


}
