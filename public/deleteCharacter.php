<?php

    require_once ('../src/class/Autoloader.php');
    Autoloader::register();
    $pdo = new Database();
    $database = $pdo->connectMe();

    $heroId = $_GET['id'];

    $sql = "DELETE FROM characters WHERE id = :id";
    $myQuery = $database->prepare($sql)->execute([':id' => $heroId]);

    header('location: index.php');
