<?php
require __DIR__ . '/vendor/autoload.php';

use App\Model\Game;
use App\Model\Person;

$person = new Person("Rodny");
$game = new Game($person);

$game->start("./configs/map.json");