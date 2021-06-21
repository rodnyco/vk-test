<?php


namespace App\View;


use App\Model\Game;
use App\Model\Person;

class InteractiveView
{
    private Game   $game;
    private Person $person;

    public function __construct(Game $game)
    {
        $this->game   = $game;
        $this->person = $game->getPerson();
    }

    public function displayView(): void
    {
        echo "\n " . $this->getInteractiveInfo();
    }

    public function getInteractiveInfo(): string
    {
        $location = $this->person->getLocation();
        $interactiveObject = $location->getInteractiveObject();

        if ($location->isEmpty === false) {
            return "\n В комнате находится " . $interactiveObject->getTitle() ."! Вы набрали ". $this->person->getCreditedPoints() ." очков!!!";
        } else {
            return "\n Комната пуста :(";
        }
    }

}