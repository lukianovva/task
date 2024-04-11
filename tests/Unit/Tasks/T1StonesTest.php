<?php

namespace Tests\Unit\Tasks;

use PHPUnit\Framework\TestCase;
use App\Tasks\T1Stones;

class T1StonesTest extends TestCase
{
    public function testPeopleAndStones(): void
    {
        $t1Stones = new T1Stones();

        $this->assertEquals([1, 2, 0, 0, 0], $t1Stones->peopleAndStones(5,3));
        $this->assertEquals([1, 2], $t1Stones->peopleAndStones(2,3));
        $this->assertEquals([5, 2, 3], $t1Stones->peopleAndStones(3,10));
        $this->assertEquals([1, 1, 0, 0], $t1Stones->peopleAndStones(4,2));
    }
}
