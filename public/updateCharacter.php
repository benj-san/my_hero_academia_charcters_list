<?php

    require_once ('../src/class/Autoloader.php');
    Autoloader::register();
    $pdo = new Database();
    $database = $pdo->connectMe();

    $heroId= $_GET['id'];

    $heroName = $_POST['name'];
    $heroDescription = $_POST['description'];

    $database->prepare('UPDATE characters SET name = :name, description= :description WHERE id = :id')->execute([':name'=>$heroName, ':description'=>$heroDescription, ':id'=>$heroId]);

    header('location: index.php');
