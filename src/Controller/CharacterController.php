<?php


namespace App\Controller;

use App\Model\CategoryManager;
use App\Model\CharacterManager;

class CharacterController extends AbstractController
{

    /**
     * Display character listing
     *
     * @return string
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     */
    public function index()
    {

        $characterManager = new characterManager();
        $indexPage = $addingPage = 'index';

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $heroName = trim(htmlspecialchars($_POST['name']));
            $heroDescription = trim(htmlspecialchars($_POST['description']));
            $heroCategory = ($_POST['category']);
            //Here we add the condition if we want to add a hero
            if (isset($_POST['addHero'])) {
                $character = [
                    'name' => $heroName,
                    'description' => $heroDescription,
                    'category_id' => $heroCategory
                ];
                $characterManager->insert($character);
            }

            //Here we add the condition if we want to update a hero
            if (isset($_POST['updateHero'])) {
                $heroId = $_POST['editId'];
                $character['name'] = $heroName;
                $character['description'] = $heroDescription;
                $character['id'] = $heroId;
                $characterManager->update($character);
            }
        }

        $heroesCharacters = $characterManager->selectAllByCategory(1);

        $vilainsCharacters = $characterManager->selectAllByCategory(2);

        $categoryManager = new CategoryManager();
        $categories = $categoryManager->selectAll();

        return $this->twig->render('Character/index.html.twig', [
            'vilainsCharacters' => $vilainsCharacters,
            'heroesCharacters' => $heroesCharacters,
            'categories' => $categories,
            'indexPage' => $indexPage,
            'addingPage' => $addingPage
        ]);
    }


    /**
     * Display character informations specified by $id
     *
     * @param int $id
     * @return string
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     */
    public function show(int $id)
    {
        $characterManager = new CharacterManager();
        $character = $characterManager->selectOneById($id);
        $indexPage = '../index';
        $addingPage = $id;

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $heroName = trim(htmlspecialchars($_POST['name']));
            $heroDescription = trim(htmlspecialchars($_POST['description']));
                $characterAdded = [
                    'name' => $heroName,
                    'description' => $heroDescription,
                ];
                $characterManager->insert($characterAdded);
        }

        if (!empty($character)) {
            return $this->twig->render('Character/character.html.twig', [
                'character' => $character,
                'indexPage' => $indexPage,
                'addingPage' => $addingPage
            ]);
        } else {
            return $this->twig->render('Character/notFound.html.twig');
        }
    }

    /**
     * Handle item deletion
     *
     * @param int $id
     */
    public function delete(int $id)
    {
        $itemManager = new characterManager();
        $itemManager->delete($id);
        header('Location:/character/index');
    }
}
