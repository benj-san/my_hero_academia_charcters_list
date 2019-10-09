<?php
require_once ('../src/include/header.php');
require_once ('../src/action/selectHero.php');
?>

<h1><?= $character['name'] ?></h1>

<p><?= $character['description'] ?></p>

<?php
require_once ('../src/include/footer.html');
?>
