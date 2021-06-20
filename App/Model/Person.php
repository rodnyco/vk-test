<?php

namespace App\Model;
use App\Model\Room;

class Person
{
    private string $name;
    private Room   $location;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function move(Room $room)
    {
        $this->location = $room;
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

    private function interactWithRoom()
    {

    }
}