<?php

include_once('game.php');

if (!isset($_GET['board'])){
    $squares = '---------';
}
else {
    $squares = $_GET['board'];
}
$game = new Game($squares);
$game->ai();
$game->display();


if($game->winner('x'))
    echo 'You win. Lucky guesses!';
else if ($game->winner('o'))
    echo 'I win. MUahaha';
else
    echo 'No winner yet, but you are losing.';



