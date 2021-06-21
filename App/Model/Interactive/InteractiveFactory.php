<?php


namespace App\Model\Interactive;


use App\Model\Interactive\Box\BoxFactory;
use App\Model\Interactive\Monster\MonsterFactory;

class InteractiveFactory
{
    /**
     * Return concrete object to interactive
     * @param string $objectName
     * @param string $objectType
     * @return InteractiveInterface
     */
    public function createObject(string $objectName, string $objectType): InteractiveInterface
    {
        if ($objectName === "box") {
            return (new BoxFactory())->createBox($objectType);
        }
        if ($objectName === "monster") {
            return (new MonsterFactory())->createMonster($objectType);
        }
    }
}