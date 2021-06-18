<?php


namespace App\Model;
use App\Model\Map;
use App\Model\Person;
use App\Model\Room;
use App\View\InformationView;
use App\Handler;

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

        $infoView->displayView();
        while (!$person->getLocation()->isFinish) {
            $roomToMove = $this->getRoomToMove();
            $person->move($roomToMove);
            print_r($person->getLocation());
        }
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
}