<?php


namespace App\Model;


use App\Model\Interactive\InteractiveInterface;

class Room
{
    private Room|null $leftRoom;
    private Room|null $rightRoom;
    private Room|null $prevRoom;

    private InteractiveInterface|null $interactiveObject;

    public bool   $isEmpty;
    public bool   $isFinish;
    //TODO: Refactor to private access
    public string $name;

    public function __construct(
        Room|null $prevRoom,
        bool $isFinish,
        InteractiveInterface|null $interactiveObject = null
    )
    {
        $this->prevRoom          = $prevRoom;
        $this->isFinish          = $isFinish;
        $this->interactiveObject = $interactiveObject;
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

    public function getName():string
    {
        return $this->name;
    }

    /**
     * Return object for interactive
     * @return InteractiveInterface
     */
    public function getInteractiveObject():InteractiveInterface|null
    {
        return $this->interactiveObject;
    }
}