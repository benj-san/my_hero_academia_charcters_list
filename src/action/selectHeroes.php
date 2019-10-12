<?php


    $sql = "SELECT * FROM characters";
    $myQuery = $database->query($sql);
    $characters = $myQuery->fetchAll(PDO::FETCH_CLASS, 'Character');


