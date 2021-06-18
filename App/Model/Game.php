<?php


namespace App\Model;
use App\Model\Map;
use App\Model\Person;

class Game
{
    private Person $person;

    public function __construct(Person $person)
    {
        $this->person = $person;
    }

    public function start($mapPath)
    {
        $map = new Map();
        $map->generateMap(file_get_contents($mapPath));

        // Spawn Person to first room
        $this->person->move($map->getFirstRoom());

        $person = $this->person;
        while (!$person->getLocation()->isFinish) {
            $person->move($person->getLocation()->getRightRoom());
            print_r($person->getLocation());
        }
    }
}