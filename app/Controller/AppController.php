<?php

namespace App\Controller;

use Core\Controller\Controller;
use App\App;

class AppController extends Controller
{
    protected $viewPath;
    protected $template = 'bootstrap3';
    protected $nav = [];

    public function __construct()
    {
        $this->viewPath = ROOT . '/app/Views/';
    }

    public function getTemplate()
    {
        return $this->template;
    }

    protected function loadModel($model_name)
    {
        $this->$model_name = App::getInstance()->getTable($model_name);
    }

    protected function forbidden()
    {
        header('HTTP/1.0 403 Forbidden');
        $this->render('access.forbidden');
        exit();
    }
}
