<?php

namespace App\Model;
use App\Model\Room;

class Person
{
    private string $name;
    private Room   $location;
    private int    $points;
    private int    $creditedPoint;

    public function __construct(string $name)
    {
        $this->name   = $name;
        $this->points = 0;
        $this->creditedPoint = 0;
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

    public function getPoints()
    {
        return $this->points;
    }

    public function getCreditedPoints()
    {
        return $this->creditedPoint;
    }

    private function interactWithRoom():void
    {
        if($this->location->isEmpty === true) return;

        $interObj = $this->location->getInteractiveObject();
        $interObj->startInteracting();
        $creditedPoints = $interObj->getPoints();

        $this->creditedPoint = $creditedPoints;
        $this->points = $this->points + $creditedPoints;

    }
}