<?php


namespace App\Controller;

use App\Model\UserManager;

class UserController extends AbstractController
{
    public function add()
    {
        $userName = trim(htmlspecialchars($_POST['name']));
        $userPassword = trim(htmlspecialchars($_POST['password']));

        $safePassword = password_hash($userPassword, PASSWORD_ARGON2I);

        $user = [
            'name' => $userName,
            'password' => $safePassword
        ];
        $userManager = new UserManager();

        $userManager->insert($user);
        header('Location:/character/index');
    }

    public function connect()
    {
        $userName = trim(htmlspecialchars($_POST['name']));
        $userPassword = trim(htmlspecialchars($_POST['password']));
        $indexPage = '../index';

        $userManager = new UserManager();
        $user = $userManager->connectMe($userName, $userPassword);
        if (!empty($user)) {
            $_SESSION['login'] = $user['name'];
            $_SESSION['idUser'] = $user['id'];
            header('Location:/character/index');
        } else {
            return $this->twig->render('Character/notFound.html.twig', [
                'indexPage' => $indexPage
            ]);
        }
    }

    public function logout()
    {
        session_unset();
        session_destroy();
        header('Location:/character/index');
    }

}
