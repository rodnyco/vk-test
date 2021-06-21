<?php
namespace App\Model\Interactive\Box;

use App\Model\Interactive\InteractiveInterface;

abstract class AbstractBox implements InteractiveInterface
{
    protected int $rangePointsFrom;
    protected int $rangePointsTo;

    /**
     * @inheritDoc
     */
    public function startInteracting(): void
    {
        // TODO: Implement startInteracting() method.
        echo 'startInteracting';
    }

    /**
     * Return random points between min and max value
     * @return int points
     */
    public function getPoints(): int
    {
        // TODO: Implement getPoints() method.
        return rand(
            $this->rangePointsFrom,
            $this->rangePointsTo
        );
    }
}