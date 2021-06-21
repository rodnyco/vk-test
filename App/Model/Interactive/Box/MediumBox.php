<?php


namespace App\Model\Interactive\Box;


use App\Model\Interactive\InteractiveInterface;

class MediumBox extends AbstractBox implements InteractiveInterface
{
    protected string $title = "Редкий";
    protected int $rangePointsFrom = 11;
    protected int $rangePointsTo   = 20;
}