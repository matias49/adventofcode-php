<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

class SolvingTest extends TestCase
{

    private function getData(){
        return [[range(2,4), range(6,8)],[range(2,3), range(4,5)],[range(5,7), range(7,9)],[range(2,8), range(3,7)],[range(6,6), range(4,6)],[range(2,6), range(4,8)]];
    }

    public function testCountOverlaps()
    {
        $solving = new \Year2022\Day4\Solving();
        $data = $this->getData();
        $this->assertEquals(4, $solving->countOverlaps($data));
    }

    public function testCountIntersections()
    {

        $solving = new \Year2022\Day4\Solving();
        $data = $this->getData();
        $this->assertEquals(2, $solving->countIntersections($data));
    }
}
