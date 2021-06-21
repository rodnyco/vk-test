<?php


namespace App\Model\Interactive;


use App\Model\Interactive\Box\BoxFactory;

class InteractiveFactory
{
    public function createObject(string $objectName, string $objectType): InteractiveInterface
    {
        if ($objectName === "box") {
            return (new BoxFactory())->createBox($objectType);
        }
        //if ($objectName === "monster") return new Monster();
    }
}