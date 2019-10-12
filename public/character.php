<?php
require_once ('../src/include/header.php');
require_once ('../src/action/selectHero.php');
?>

<h1><?= $character->getName() ?></h1>

<p><?= $character->getDescription() ?></p>

<?php
require_once ('../src/include/footer.html');
?>