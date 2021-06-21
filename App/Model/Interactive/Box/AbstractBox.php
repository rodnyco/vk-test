<?php
namespace App\Model\Interactive\Box;

use App\Model\Interactive\InteractiveInterface;

abstract class AbstractBox implements InteractiveInterface
{
    protected string $title;
    protected int    $rangePointsFrom;
    protected int    $rangePointsTo;

    private   int $points;

    public function getTitle(): string
    {
        return $this->title . " клад";
    }

    /**
     * @inheritDoc
     */
    public function startInteracting(): void
    {
        $this->generatePoints();
    }

    /**
     * Return random points between min and max value
     * @return int points
     */
    public function getPoints(): int
    {
        return $this->points;
    }

    private function generatePoints(): void
    {
        $generatedPoints = rand(
            $this->rangePointsFrom,
            $this->rangePointsTo
        );

        $this->points = $generatedPoints;
    }
}