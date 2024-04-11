<?php

namespace Review\One;

use Exception;
use PDO;

class MyPersonService
{
    /**
     * Возвращает средний индекс массы тела всех лиц мужского пола старше 18 лет
     *
     * @param $age
     * @return void
     */
    public function getAdultMaleClientsAverageBMI($age): void
    {
        $totalImt = 0;
        $countOfPerson = 0;

        try {
            $connection = new PDO("postgresql:host=172.10.10.1;dbname=prod;", "admin", "qwerty$4");
            $statement = $connection->query("SELECT * FROM person WHERE sex = 'male' AND age >= " . $age);
            $result = $statement->fetchAll();

            $adultPersons = [];
            foreach ($result as $row) {
                $person = new Person();
                // Заполняем по данным строки
                $person->id = $row[0];
                $person->sex = $row[1];
                $person->name = $row[2];
                $person->age = $row[3];
                $person->weight = $row[4];
                $person->height = $row[5];

                $adultPersons[] = $person;
            }

            $countOfPerson = count($adultPersons);
            echo "Count of person: " . $countOfPerson;

            //BMI alg next
            foreach ($adultPersons as $adultPerson) {
                $heightInMeters = $adultPerson->height / 100;
                $imt = $adultPerson->weight / ($heightInMeters * $heightInMeters);
                $totalImt += $imt;
            }
        } catch (Exception $e) {
            echo $e->getTraceAsString();
        }

        // Нам нужно передать эту строку в консоль, это не просто запись в лог. не удаляйте ее, plz!
        echo "Average imt - " . ($totalImt / $countOfPerson);
    }
}
