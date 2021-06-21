<?php


namespace App\Model\Interactive\Box;


use App\Model\Interactive\InteractiveInterface;

class PremiumBox extends AbstractBox implements InteractiveInterface
{
    protected string $title = "Очень редкий";
    protected int $rangePointsFrom = 21;
    protected int $rangePointsTo   = 30;
}