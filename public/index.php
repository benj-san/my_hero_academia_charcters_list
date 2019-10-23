<?php
//We first need the autoloader, given by twig inside the vendor directory
require '../vendor/autoload.php';

//But still I need all my previous objects
require_once ('../src/class/Autoloader.php');
Autoloader::register();
$pdo = new Database();
$database = $pdo->connectMe();

try {
// We define where we wanna put our template directory with our view files
    $loader = new Twig\Loader\FilesystemLoader(__DIR__ . '/../src/template');
// We create a new twig environment object, we disable the cache, and allow the debug mode
    $twig = new Twig\Environment($loader, [
        'cache' => false,
        'debug' => true
    ]);

//We can add some twig functions / filters / Macro or extension i.e. :
//I want to be able to dump every variables in my twig view
    $twig->addExtension(new Twig\Extension\DebugExtension());
    $twig->addExtension(new Twig_Extensions_Extension_Text());

// We create a switch case for all the pagges we want to display, all of em will be detected by a GET action
// But when we first come on the website we want to see the home page so...
    $page = 'home';
    if (isset($_GET['page'])) {
        $page = $_GET['page'];
    }

    //Here we check if someone wants to suppress a hero
    if (isset($_GET['action']) && $_GET['action'] === 'suppressHero'){
        $heroId = $_GET['id'];

        $deleteCharacter = new Character();
        $deleteCharacter->deleteIt($database, $heroId);

        header ('location: index.php');
    }

    //here we test the forms
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $heroName = trim(htmlspecialchars($_POST['name']));
        $heroDescription = trim(htmlspecialchars($_POST['description']));
        //Here we add the condition if we want to add a hero
        if (isset($_POST['addHero'])) {

            $addHero = new Character();
            $addHero->addIt($database, $heroName, $heroDescription);
        }

        //Here we add the condition if we want to update a hero
        if (isset($_POST['updateHero'])) {
            $heroId= $_GET['id'];

            $updateCharacter = new Character();
            $updateCharacter->updateIt($database, $heroId, $heroName, $heroDescription);
        }
    }


    switch ($page){
        case 'home' :

            //we import our heroes selection
            $sql = "SELECT * FROM characters";
            $myQuery = $database->query($sql);
            $characters = $myQuery->fetchAll(PDO::FETCH_CLASS, 'Character');
            $targetPage = '';
            // Then we can load the correct page according to the target
            echo $twig->render('home.html.twig',
                [
                    'characters' => $characters
                ]);
            break;

        case 'character' :

            //We import the hero selection
            $idHero = $_GET['id'];

            $sql = "SELECT * FROM characters WHERE id = :id";
            $myQuery = $database->prepare($sql);
            $myQuery->setFetchMode(PDO::FETCH_CLASS, 'Character');
            $myAction = $myQuery->execute([':id' => $idHero]);
            $character = $myQuery->fetch();

            $targetPage = "?page=$page&id=$idHero";

            if(!empty($character)){
                // Then we can load the correct page according to the target
                echo $twig->render('character.html.twig',
                    [
                        'character' => $character,
                        'targetPage' => $targetPage
                    ]);
            } else{
                echo $twig->render('notFound.html.twig');
            }
            break;

        default :
            echo $twig->render('notFound.html.twig');
            break;
    }


} catch (Exception $e) {
die ('Woops, looks like something went wrong : ' . $e->getMessage());
}

