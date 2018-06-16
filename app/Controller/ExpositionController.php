<?php

namespace App\Controller;

use Core\Controller\Controller;

class ExpositionController extends AppController
{

    public function __construct()
    {
        parent::__construct();
        $this->loadModel('Exposition');
    }

    public function index()
    {
        $items = $this->Exposition->all();
        $this->render('exposition.index', compact('items'));
    }

    public function show()
    {
        $this->loadModel('Oeuvre');
        $exposition = $this->Exposition->find($_GET['id']);
        $exposition->oeuvres = $this->Oeuvre->findByExpositionId($_GET['id']);
        if ($exposition === false) {
            $this->notFound();
        }
        $this->render('exposition.show', compact('exposition', 'oeuvres'));
    }
}
