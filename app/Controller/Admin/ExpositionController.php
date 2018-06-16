<?php

namespace App\Controller\Admin;

use Core\Controller\Controller;
use App\Controller\Admin\AppController;
use Core\HTML\BootstrapForm;

class ExpositionController extends AppController
{
    public function __construct()
    {
        AppController::__construct();
        $this->loadModel('Exposition');
    }

    public function index()
    {
        $items = $this->Exposition->last();
        $this->render('admin.exposition.index', compact('items'));
    }

    public function manage()
    {
        $this->loadModel('OeuvreExposee');
        $exposition = $this->OeuvreExposee->findOeuvresByExposition($_GET['id']);
        if ($exposition) {
            $this->loadModel('Oeuvre');
            $oeuvres = $this->Oeuvre->all();
            $form = new BootstrapForm($exposition);
            $this->render('admin.exposition.manage', compact('form', 'oeuvres'));
        }
    }

    public function edit()
    {
        if (!empty($_POST)) {
            $result = $this->Exposition->update($_GET['id'], [
                'nom' => $_POST['nom'],
                'lieu' => $_POST['lieu'],
                'adresse' => $_POST['adresse'],
                'dateDebut' => $_POST['dateDebut'],
                'dateFin' => $_POST['dateFin'],
                'dateVernissage' => $_POST['dateVernissage']
            ]);
            if ($result) {
                return $this->index();
            }
        }

        $item = $this->Exposition->find($_GET['id']);


        if ($item) {
            $date_time = explode(' ', $item->dateVernissage);
            $item->dateVernissage = $date_time[0];
            $item->timeVernissage = $date_time[1];
            $form = new BootstrapForm($item);
            $action = 'Edition';
            $this->render('admin.exposition.add', compact('form', 'action', 'oeuvres'));
            exit();
        } else {
            $this->notFound();
            exit();
        }
    }
}
