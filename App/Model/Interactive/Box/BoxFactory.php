<?php


namespace App\Model\Interactive\Box;


use App\Model\Interactive\InteractiveInterface;

class BoxFactory
{
    /**
     * Create box by type
     * @param $type
     * @return InteractiveInterface
     */
    public function createBox($type): InteractiveInterface
    {
        switch ($type) {
            case "simple":
                $box = new SimpleBox();
                break;
            case "medium":
                $box = new MediumBox();
                break;
            case "premium":
                $box = new PremiumBox();
                break;
        }
        return $box;
    }
}