<?php
    require_once ('../src/include/header.php');
?>
    <main>
        <video autoplay muted loop id="backgroundVideo">
            <source src="asset/background_video.mp4" type="video/mp4" />
            My hero academia : Votre navigateur ne permet pas de charger cette vidéo
        </video>

        <section id="cardContainer">
            <h1>Our Heroes :</h1>

            <?php
            foreach($characters as $character){
            ?>
                <a href="character.php?id=<?= $character['id'] ?>">
                    <article>
                        <img src="asset/picture/hero/default.png" alt="<?= $character['name'] ?>">
                        <h2><?= $character['name'] ?></h2>
                        <p><?= $character['description'] ?></p>
                    </article>
                </a>
            <?php
            }
            ?>

        </section>

    </main>

<?php
require_once ('../src/include/footer.html');
?>
