<?php
require __DIR__ . '/vendor/autoload.php';

use App\Model\Game;
use App\Model\Person;
use App\Handler;

$person  = new Person("Rodny");
$handler = new Handler();

$game = new Game($person, $handler);
$game->start("./configs/map.json");