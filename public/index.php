<?php
    require_once ('../src/include/header.php');
    require_once '../src/action/selectHeroes.php';
?>
    <main>
        <video autoplay muted loop id="backgroundVideo">
            <source src="asset/background_video.mp4" type="video/mp4" />
            My hero academia : Votre navigateur ne permet pas de charger cette vidéo
        </video>

        <section id="cardContainer">
            <h1>Our Heroes :</h1>

            <?php
                foreach ($characters as $character) {
            ?>

                <div class="characterCard">
                    <button class="updateMe" type="button">
                        <img src="asset/picture/update.png" alt="Update character">
                    </button>
                    <a onClick="return confirm('Are you sure you want to delete?');" class="deleteMe"
                       href="deleteCharacter.php?id=<?= $character['id'] ?>">x</a>
                    <a href="character.php?id=<?= $character['id'] ?>">
                        <article>
                            <img src="asset/picture/hero/default.png" alt="default picture">
                            <h2><?= $character['name'] ?></h2>
                            <p><?= $character['description'] ?></p>
                        </article>
                    </a>
                    <form class="updateForm" action="updateCharacter.php?id=<?= $character['id'] ?>" method="post">
                        <label id="fullLabel">
                            <input type="text" name="name" placeholder="Modify name" value="<?= $character['name'] ?>">
                        </label>
                        <label id="fullLabel">
                            <textarea name="description" placeholder="Modify Description">
                                <?= $character['description'] ?>
                            </textarea>
                        </label>
                        <input type="submit" value="Update !">
                    </form>
                </div>

            <?php
                }
            ?>

        </section>

    </main>

<?php
require_once ('../src/include/footer.html');
?>
