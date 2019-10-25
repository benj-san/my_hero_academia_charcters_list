<?php

require_once ('../src/class/Autoloader.php');
Autoloader::register();
$pdo = new Database();
$database = $pdo->connectMe();

$idHero = $_GET['id'];

$sql = "SELECT * FROM characters WHERE id = :id";
$myQuery = $database->prepare($sql);
$myQuery->setFetchMode(PDO::FETCH_ASSOC);
$myAction = $myQuery->execute([':id' => $idHero]);
$character = $myQuery->fetch();
$jsonCharacter = json_encode($character);

echo $jsonCharacter;
