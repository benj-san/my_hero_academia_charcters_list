<?php

    require_once ('../src/class/Autoloader.php');
    Autoloader::register();
    $pdo = new Database();
    $database = $pdo->connectMe();

    $heroName = $_POST['name'];
    $heroDescription = $_POST['description'];

    $sql = "INSERT INTO characters (name, description ) VALUES (:name, :description)";
    $myQuery = $database->prepare($sql);
    $myAction = $myQuery->execute([':name' => $heroName, ':description' => $heroDescription]);

    header('location: index.php');