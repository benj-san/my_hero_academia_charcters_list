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
        $indexPage = 'index';
        $addPage = 'add';

        $categoryManager = new CategoryManager();
        $categories = $categoryManager->selectAll();

        $characters = $characterManager->selectAllByCategory();

        return $this->twig->render('Character/index.html.twig', [
            'characters' => $characters,
            'categories' => $categories,
            'indexPage' => $indexPage,
            'addPage' => $addPage
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
        $addPage = '../add';

        if (!empty($character)) {
            return $this->twig->render('Character/character.html.twig', [
                'character' => $character,
                'indexPage' => $indexPage,
                'addPage' => $addPage
            ]);
        } else {
            return $this->twig->render('Character/notFound.html.twig', [
                'indexPage' => $indexPage
            ]);
        }
    }

    /**
     * Handle character deletion
     *
     * @param int $id
     */
    public function delete(int $id)
    {
        $itemManager = new characterManager();
        $itemManager->delete($id);
        header('Location:/character/index');
    }

    /**
     * Handle character deletion
     *
     * @param int $id
     */
    public function edit(int $id)
    {

        $heroId = $id;
        $heroName = trim(htmlspecialchars($_POST['name']));
        $heroDescription = trim(htmlspecialchars($_POST['description']));

        $character['name'] = $heroName;
        $character['description'] = $heroDescription;
        $character['id'] = $heroId;

        $itemManager = new characterManager();
        $itemManager->update($character);

        header('Location:/character/index');
    }

    public function add()
    {
        $heroName = trim(htmlspecialchars($_POST['name']));
        $heroDescription = trim(htmlspecialchars($_POST['description']));
        $heroCategory = ($_POST['category']);
        $character = [
            'name' => $heroName,
            'description' => $heroDescription,
            'category_id' => $heroCategory
        ];
        $characterManager = new CharacterManager();

        $characterManager->insert($character);
        header('Location:/character/index');
    }
}
