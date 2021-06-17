<?php
require __DIR__ . '/vendor/autoload.php';

use App\Model\User;
use App\Model\Game;

$q = readline("Your name: ");
readline_add_history($q);
$name = readline_list_history()[0];
$user = new User();
$user->setName($name);

echo $user->getName() . ", игра запущена!" . "\n";

$game = new Game();
$game->start("./configs/map.json");