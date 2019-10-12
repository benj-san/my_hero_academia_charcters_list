<?php

    require_once ('../src/class/Autoloader.php');
    Autoloader::register();
    $pdo = new Database();
    $database = $pdo->connectMe();

    $heroId= $_GET['id'];
    $heroName = $_POST['name'];
    $heroDescription = $_POST['description'];

    $updateCharacter = new Character();
    $updateCharacter->updateIt($database, $heroId, $heroName, $heroDescription);

    header('location: index.php');
