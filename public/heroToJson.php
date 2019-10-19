<?php

    require_once ('../src/class/Autoloader.php');
    Autoloader::register();
    $pdo = new Database();
    $database = $pdo->connectMe();

    $sql = "SELECT * FROM characters";
    $myQuery = $database->prepare($sql);
    $myAction = $myQuery->execute();
    $characters = $myQuery->fetchAll(PDO::FETCH_ASSOC);
    $jsonCharacters = json_encode($characters);

    echo $jsonCharacters;