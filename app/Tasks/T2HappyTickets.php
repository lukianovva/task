<?php

namespace App\Tasks;

class T2HappyTickets
{
    /**
     * Необходимо реализовать метод, который проверяет, является ли билет счастливым.
     * Счастливым билетом называют такой билет с шестизначным номером, где сумма первых трех цифр равна сумме последних трех.
     * Если строка не является номером билета (содержит более или менее 6 символов-цифр) необходимо выбросить исключение InvalidArgumentException
     *
     * Например:
     * билет с номером 412016 является счастливым, т.к. 4+1+2 = 0+1+6
     */
    public function isHappy(string $ticketNum): bool {
        return false;
        // Тут должна быть реализация
    }
}