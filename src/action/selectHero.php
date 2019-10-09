<?php
    $idHero = $_GET['id'];

    $sql = "SELECT * FROM characters WHERE id = :id";
    $myQuery = $database->prepare($sql);
    $myAction = $myQuery->execute([':id' => $idHero]);
    $character = $myQuery->fetch();