<?php

namespace App\Model;


class Person
{
    private string $name;
    private Room $location;

    public function moveToPrev()
    {
        //$this->location = $this->location->getPrevRoom();
    }

    public function moveToLeft()
    {
        //
    }

    public function moveToRight()
    {
        //
    }

    public function setName(string $name)
    {
        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }
}