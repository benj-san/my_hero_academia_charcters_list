<?php
    $idHero = $_GET['id'];

    $sql = "SELECT * FROM characters WHERE id = :id";
    $myQuery = $database->prepare($sql);
    $myQuery->setFetchMode(PDO::FETCH_CLASS, 'Character');
    $myAction = $myQuery->execute([':id' => $idHero]);
    $character = $myQuery->fetch();