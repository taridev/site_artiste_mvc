<?php

namespace App\Controller;

use Core\HTML\BootstrapForm;
use App\App;
use App\Auth;

class UserController extends AppController
{
    public function login()
    {
        $errors = false;
        if (!empty($_POST) and isset($_POST['login']) and isset($_POST['password'])) {
            $auth = new Auth();
            if ($auth->login($_POST['login'], $_POST['password'])) {
                return header('Location: .');
            } else {
                $errors = true;
            }
        }
        $form = new BootstrapForm($_POST);
        $this->render('user.login', compact('form', 'errors'));
    }

    public function logout()
    {
        $auth = new Auth();
        $auth->logout();
    }
}
