<?php


namespace App\Model;
use App\Model\Room;

class Map
{
    public function getFirstRoom()
    {
        return 1;
    }

    public function generateMap($jsonMap)
    {
        $arrMap = json_decode($jsonMap,true);
        $roomsQueue = [];

        $firstRoom = new Room();
        $firstRoom->isEmpty = $arrMap["isEmpty"];
        $firstRoom->isFinish = $arrMap["isFinish"];
        $firstRoom->setPrevRoom(null);
        $firstRoom->name = $arrMap["name"];

        array_push($roomsQueue, [
            "room" => $firstRoom,
            "next" => $arrMap["next"]
        ]);

        while (!empty($roomsQueue)) {
            $prevRoom = $roomsQueue[0]["room"];
            $next = $roomsQueue[0]["next"];

            if($next["leftRoom"] != null) {
                $newLeftRoom = new Room();
                $newLeftRoom->isEmpty = $next["leftRoom"]["isEmpty"];
                $newLeftRoom->isFinish = $next["leftRoom"]["isFinish"];
                $newLeftRoom->setPrevRoom($prevRoom);
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
                $newRightRoom = new Room();
                $newRightRoom->isEmpty = $next["rightRoom"]["isEmpty"];
                $newRightRoom->isFinish = $next["rightRoom"]["isFinish"];
                $newRightRoom->setPrevRoom($prevRoom);
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