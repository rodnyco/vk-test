<?php


namespace App\Model\Interactive;


interface InteractiveInterface
{
    /**
     * Create interactive Object with parameters
     * @return $this
     */
    public function create(string $type):InteractiveInterface;

    /**
     * Method to start interaction
     * @return void
     */
    public function startInteracting():void;

    /**
     * All interactive objects score points. This method return the number of such points
     * @return int
     */
    public function getPoints():int;
}