<?php

    require_once ('../src/class/Autoloader.php');
    Autoloader::register();
    $pdo = new Database();
    $database = $pdo->connectMe();

    $heroName = $_POST['name'];
    $heroDescription = $_POST['description'];

    $addHero = new Character();
    $addHero->addIt($database, $heroName, $heroDescription);

    header('location: index.php');