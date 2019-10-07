<?php

    $query = "SELECT * FROM characters";
    $result = $database->query($query);
    $characters = $result->fetchAll();


