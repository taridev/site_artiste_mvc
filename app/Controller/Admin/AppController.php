<?php

namespace App\Controller\Admin;

use \App\App;
use \App\Auth;
use Core\HTML\BootstrapForm;

class AppController extends \App\Controller\AppController
{
    protected $auth;
    public function __construct()
    {
        parent::__construct();
        // Auth
        $this->auth = new Auth();
        if (!$this->auth->logged()) {
            $this->forbidden();
        }
    }

    protected function forbidden()
    {
        header('HTTP/1.0 403 Forbidden');
        $this->render('access.forbidden');
        exit();
    }

    public function __destruct()
    {

    }
}
