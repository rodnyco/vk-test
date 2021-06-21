<?php

namespace App\Model;
use App\Model\Room;

class Person
{
    private string $name;
    private Room   $location;
    private int    $points;

    public function __construct(string $name)
    {
        $this->name   = $name;
        $this->points = 0;
    }

    public function move(Room $room)
    {
        $this->location = $room;
        $this->interactWithRoom();
        return $this;
    }

    public function getLocation()
    {
        return $this->location;
    }

    public function setName(string $name)
    {
        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }

    private function interactWithRoom():void
    {
        if($this->location->isEmpty === true) return;

        $interObj = $this->location->getInteractiveObject();
        $interObj->startInteracting();
        $creditedPoints = $interObj->getPoints();
        $this->points = $this->points + $creditedPoints;
        
        $this->location->isEmpty = true;
        print_r($this);
    }
}