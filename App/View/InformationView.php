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

    public function displayView(): void
    {
        echo $this->getPersonInfo() . "\n" . $this->getRoomInfo() ;
    }

    private function getRoomInfo(): string
    {
        $location = $this->person->getLocation();

        $currentRoom = $location->getName();
        $prevRoom = $location->getPrevRoom();
        $leftRoom = $location->getLeftRoom();
        $rightRoom = $location->getRightRoom();

        return
            "\n Текущая комната: "    . $currentRoom .
            "\n Предыдущая комната: " . ($prevRoom  != null ? $prevRoom->getName()  : "Нет комнаты") .
            "\n Комната налево: "     . ($leftRoom  != null ? $leftRoom->getName()  : "Нет комнаты") .
            "\n Комната направо: "    . ($rightRoom != null ? $rightRoom->getName() : "Нет комнаты")
        ;
    }

    private function getPersonInfo(): string
    {
        $person = $this->person;

        return
            "\n Имя персонажа: "    . $person->getName() .
            "\n Количество очков: " . $person->getPoints()
            ;
    }
}