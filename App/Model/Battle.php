<?php


namespace App\Model;


use App\Model\Interactive\Monster\Monster;

class Battle
{
    private Monster $monster;

    public function __construct(Monster $monster)
    {
        $this->monster = $monster;
    }

    public function start()
    {
        $monster = $this->monster;
        while (!$monster->isDefeated()) {
            $monsterPower = $monster->getPower();
            $randomInt = $this->getRandomNumber();
            echo "\n Раунд: Сила монстра: " . $monsterPower . " Случайное число: " . $randomInt;
            if($randomInt > $monsterPower) {
                $monster->kill();
                echo "\n Монстр убит";
            } else {
                $monster->toDamage();
                echo "\n Монстру нанесен урон";
            }

        }

    }

    private function getRandomNumber()
    {
        return rand(1, 7);
    }
}