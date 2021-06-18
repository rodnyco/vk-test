<?php
namespace App\View;
use App\Model\Game;
use App\Model\Person;

class InformationView
{
    private Game   $game;
    private Person $person;

    public function __construct(Game $game)
    {
        $this->game = $game;
        $this->person = $game->getPerson();
    }

    public function displayView():void
    {
        echo $this->getPersonInfo();
    }

    private function getPersonInfo():string
    {
        return
            "Имя персонажа: " . $this->person->getName() . "
        ";
    }
}