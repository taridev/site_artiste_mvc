<?php

namespace App\Controller\Admin;

class AdminController extends AppController
{
    public function __construct()
    {
        AppController::__construct();
        $this->loadModel('Oeuvre');
        $this->loadModel('Exposition');
    }

    public function index()
    {
        $last_expositions = $this->Exposition->last(5);
        $last_oeuvres = $this->Oeuvre->last(10);
        $this->render('admin.index', compact('last_oeuvres', 'last_expositions'));
    }
}
