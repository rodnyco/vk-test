<?php
require __DIR__ . '/vendor/autoload.php';

use App\Model\Game;

$game = new Game();
$game->start("./configs/map.json");