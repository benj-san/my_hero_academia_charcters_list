<?php


namespace App\Controller;

use App\Model\CategoryManager;
use App\Model\CharacterManager;

class ApiController extends AbstractController
{

    public function character($id)
    {
        $characterManager = new CharacterManager();
        $character = json_encode($characterManager->selectOneById($id));

        return $character;
    }

    public function characters()
    {
        $characterManager = new CharacterManager();
        $characters = json_encode($characterManager->selectAll());

        return $characters;
    }

    public function heroes()
    {
        $characterManager = new CharacterManager();
        $characters = json_encode($characterManager->selectAllByCategory(1));

        return $characters;
    }

    public function vilains()
    {
        $characterManager = new CharacterManager();
        $characters = json_encode($characterManager->selectAllByCategory(2));

        return $characters;
    }

    public function categories()
    {
        $categoryManager = new CategoryManager();
        $categories = json_encode($categoryManager->selectAll());

        return $categories;
    }

    public function category($id)
    {
        $categoryManager = new CategoryManager();
        $category = json_encode($categoryManager->selectOneById($id));

        return $category;
    }

}