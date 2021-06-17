<?php


namespace App\Model;
use App\Model\Map;

class Game
{
    public function start($mapPath)
    {
        $map = file_get_contents($mapPath);
        $mapModel = new Map();
        $mapModel->generateMap($map);
//        $room = $map->getFirstRoom();
//        while (true) {
//            //
//        }
    }
}