<?php


namespace App\Model;
use App\Model\Room;

class Map
{
    private Room $firstRoom;

    public function getFirstRoom()
    {
        return $this->firstRoom;
    }

    public function generateMap($jsonMap)
    {
        $arrMap = json_decode($jsonMap,true);
        $roomsQueue = [];

        $firstRoom = new Room(null, $arrMap["isFinish"]);
        $firstRoom->isEmpty = $arrMap["isEmpty"];
        $firstRoom->name = $arrMap["name"];

        array_push($roomsQueue, [
            "room" => $firstRoom,
            "next" => $arrMap["next"]
        ]);

        while (!empty($roomsQueue)) {
            $prevRoom = $roomsQueue[0]["room"];
            $next = $roomsQueue[0]["next"];

            if($next["leftRoom"] != null) {
                $newLeftRoom = new Room($prevRoom, $next["leftRoom"]["isFinish"]);
                $newLeftRoom->isEmpty = $next["leftRoom"]["isEmpty"];
                $prevRoom->setLeftRoom($newLeftRoom);
                $newLeftRoom->name = $next["leftRoom"]["name"];
                array_push($roomsQueue, [
                    "room" => $newLeftRoom,
                    "next" => $next["leftRoom"]["next"]
                ]);
            } else {
                $prevRoom->setLeftRoom(null);
            }

            if($next["rightRoom"] != null) {
                $newRightRoom = new Room($prevRoom, $next["rightRoom"]["isFinish"]);
                $newRightRoom->isEmpty = $next["rightRoom"]["isEmpty"];
                $prevRoom->setRightRoom($newRightRoom);
                $newRightRoom->name = $next["rightRoom"]["name"];
                array_push($roomsQueue, [
                    "room" => $newRightRoom,
                    "next" => $next["rightRoom"]["next"]
                ]);
            } else {
                $prevRoom->setRightRoom(null);
            }

            array_shift($roomsQueue);
        }
        print_r($firstRoom->getLeftRoom());
    }
}