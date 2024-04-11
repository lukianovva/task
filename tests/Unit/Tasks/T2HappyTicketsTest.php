<?php

namespace Unit\Tasks;

use App\Tasks\T2HappyTickets;
use PHPUnit\Framework\TestCase;

class T2HappyTicketsTest extends TestCase
{
    public function testTrue(): void
    {
        $tickets = new T2HappyTickets();

        $this->assertTrue($tickets->isHappy("385916"));
        $this->assertTrue($tickets->isHappy("631451"));
    }

    public function testFalse(): void
    {
        $tickets = new T2HappyTickets();

        $this->assertFalse($tickets->isHappy("154166"));
        $this->assertFalse($tickets->isHappy("111112"));
    }

    public static function exceptionDataProvider(): array
    {
        return [
            ["38591612"],
            ["63145"],
            ["63d145"]
        ];
    }

    /**
     * @dataProvider exceptionDataProvider
     */
    public function testException($ticketNum): void
    {
        $this->expectException(\InvalidArgumentException::class);

        $tickets = new T2HappyTickets();

        $tickets->isHappy($ticketNum);
    }
}