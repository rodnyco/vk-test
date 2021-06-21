<?php


namespace App\Model\Interactive\Monster;


use App\Model\Interactive\InteractiveInterface;

class MonsterFactory
{
    public function createMonster(string $type): InteractiveInterface
    {
        switch ($type) {
            case "junior":
                $monster = (new Monster())->create(1,10,5);
                break;
            case "middle":
                $monster = (new Monster())->create(11,20,3);
                break;
            case "senior":
                $monster = (new Monster())->create(21,30,1);
                break;
        }

        return $monster;
    }
}