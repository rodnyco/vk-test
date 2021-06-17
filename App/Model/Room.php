<?php


namespace App\Model;


class Room
{
    private Room|null $leftRoom;
    private Room|null $rightRoom;
    private Room|null $prevRoom;

    //TODO: add box or monster

    public bool $isEmpty;
    public bool $isFinish;
    public string $name;

    /**
     * Return the left room if it exists
     * @return Room|null
     */
    public function getLeftRoom()
    {
        return $this->leftRoom;
    }

    /**
     * Return the right room if it exists
     * @return Room|null
     */
    public function getRightRoom()
    {
        return $this->rightRoom;
    }

    /**
     * Return the previous room if it exists
     * @return Room|null
     */
    public function getPrevRoom()
    {
        return $this->prevRoom;
    }

    /**
     * Returns information about the existence of objects in the room for interaction (box or monster)
     * @return bool
     */
    public function isEmpty()
    {
        return $this->isEmpty;
    }

    /**
     * Return true if room is finish
     * @return bool
     */
    public function isFinish()
    {
        return $this->isFinish;
    }

    public function setPrevRoom(Room|null $prevRoom)
    {
        $this->prevRoom = $prevRoom;
        return $this;
    }

    public function setLeftRoom(Room|null $leftRoom)
    {
        $this->leftRoom = $leftRoom;
        return $this;
    }

    public function setRightRoom(Room|null $rightRoom)
    {
        $this->rightRoom = $rightRoom;
        return $this;
    }
}