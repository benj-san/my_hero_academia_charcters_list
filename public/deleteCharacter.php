<?php

    require_once ('../src/class/Autoloader.php');
    Autoloader::register();
    $pdo = new Database();
    $database = $pdo->connectMe();

    $heroId = $_GET['id'];

    $sql = "DELETE FROM characters WHERE id = :id";
    $supp = $database->prepare($sql);
    $louisXVI = $supp->execute([':id'=> $heroId]);

    header('location: index.php');
