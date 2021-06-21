<?php


namespace App\Model\Interactive\Box;


use App\Model\Interactive\InteractiveInterface;

class SimpleBox extends AbstractBox implements InteractiveInterface
{
    protected string $title = "Простой";
    protected int $rangePointsFrom = 1;
    protected int $rangePointsTo   = 10;
}