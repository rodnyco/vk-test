<?php


namespace App\Model;


class Room
{
    private Room|null $leftRoom;
    private Room|null $rightRoom;
    private Room|null $prevRoom;

    //TODO: add box or monster

    public bool   $isEmpty;
    public bool   $isFinish;
    public string $name;

    public function __construct(Room|null $prevRoom, bool $isFinish)
    {
        $this->prevRoom  = $prevRoom;
        $this->isFinish  = $isFinish;
    }

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

    public function getNearbyRooms():array
    {
        return [
            'prev'  => $this->getPrevRoom(),
            'left'  => $this->getLeftRoom(),
            'right' => $this->getRightRoom()
        ];
    }
}