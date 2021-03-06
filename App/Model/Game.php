<?php


namespace App\Model;
use App\Model\Interactive\Box\BoxFactory;
use App\View\InformationView;
use App\Handler;
use App\View\InteractiveView;

class Game
{
    private Person  $person;
    private Handler $handler;

    public function __construct(Person $person, Handler $handler)
    {
        $this->person  = $person;
        $this->handler = $handler;
    }

    public function start($mapPath)
    {
        //TODO: Map to construct
        $map = new Map();
        $map->generateMap(file_get_contents($mapPath));

        // Spawn Person to first room
        $this->person->move($map->getFirstRoom());

        $person = $this->person;
        $infoView = new InformationView($this);
        $interactiveView = new InteractiveView($this);

        $infoView->displayView();
        while (!$person->getLocation()->isFinish) {
            $roomToMove = $this->getRoomToMove();
            $person->move($roomToMove);
            $infoView->displayView();
            $interactiveView->displayView();
            $roomToMove->isEmpty = true;
        }
        $infoView->displayWinView();
        $this->writeResult();
    }

    public function getPerson()
    {
        return $this->person;
    }

    private function getRoomToMove():Room
    {
        $handler = $this->handler;
        $nearbyRooms = $this->person->getLocation()->getNearbyRooms();

        $personMoveSide = $handler->handleMove(
            $nearbyRooms['prev'] != null,
            $nearbyRooms['left'] != null,
            $nearbyRooms['right'] != null,
        );

        return $nearbyRooms[$personMoveSide];
    }

    private function writeResult(): void
    {
        $results = [
            'Имя персонажа' => $this->person->getName(),
            'Набранное количество очков' => $this->person->getPoints()
        ];
        file_put_contents("../../../data/results.txt", print_r($results), FILE_APPEND);
    }
}