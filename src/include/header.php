<?php
require_once ('../src/class/Autoloader.php');
Autoloader::register();
$pdo = new Database();
$database = $pdo->connectMe();
require_once '../src/action/selectHeroes.php';

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>My Hero Academia !</title>
    <style>
        @import url('https://fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i&display=swap');
        @import url('asset/css/style.css');
    </style>

</head>
<body>
<header id="headerPosition">
    <a href="index.php#headerPosition">
        <img src="asset/picture/hero/default.png" alt="My Hero Academia">
    </a>
    <nav>
        <button id="popMyForm" type="button">
            <img src="asset/picture/plus.png" alt="Add a Hero" >
        </button>
    </nav>
</header>

<form id="insertHeroForm" action="addHero.php" method="post">
    <h2>Here comes a new challenger !</h2>
    <label id="halfLabel" >
        <input type="text" name="name" placeholder="Enter a name *">
    </label>
    <label id="fullLabel" >
        <textarea name="description" placeholder="Enter a description *"></textarea>
    </label>
    <input type="submit" value="Add !">
</form>
