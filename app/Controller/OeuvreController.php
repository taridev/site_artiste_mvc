<?php

namespace App\Controller;

class OeuvreController extends AppController
{

    public function __construct()
    {
        parent::__construct();
        $this->loadModel('Oeuvre');
    }

    public function index()
    {
        $items = $this->Oeuvre->all();
        $this->render('oeuvre.index', compact('items'));
    }

    public function show()
    {
        $item = $this->Oeuvre->find($_GET['id']);
        if ($item === false) {
            $this->notFound();
        }
        $this->render('oeuvre.show', compact('item'));
    }
}
