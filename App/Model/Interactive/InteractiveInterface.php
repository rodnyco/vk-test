<?php


namespace App\Model\Interactive;


interface InteractiveInterface
{
    /**
     * Method to start interaction
     * @return void
     */
    public function startInteracting(): void;

    /**
     * All interactive objects score points. This method return the number of such points
     * @return int
     */
    public function getPoints(): int;

    /**
     * @return string title of interactive object
     */
    public function getTitle(): string;
}