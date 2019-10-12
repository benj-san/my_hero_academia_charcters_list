<?php

    require_once ('../src/class/Autoloader.php');
    Autoloader::register();
    $pdo = new Database();
    $database = $pdo->connectMe();

    $heroId = $_GET['id'];

    $deleteCharacter = new Character();
    $deleteCharacter->deleteIt($database, $heroId);

    header('location: index.php');
