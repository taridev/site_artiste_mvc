<?php

namespace App\Controller\Admin;

use Core\HTML\BootstrapForm;
use \Core\Util;

class OeuvreController extends AppController
{
    public function __construct()
    {
        AppController::__construct();
        $this->loadModel('Oeuvre');
    }

    public function index()
    {
        $items = $this->Oeuvre->last();
        \Core\Auth\Auth::renewCsrfToken();
        $this->render('admin.oeuvre.index', compact('items'));
    }

    public function add()
    {
        if (!empty($_POST) and !empty($_FILES["file"]["name"])) {
            $upload = $this->uploadImage();
            // Si $upload est un tableau alors on passe en erreur.
            if (is_array($upload)) {
                $action = 'Création';
                $errors = $upload;
                $form = new BootstrapForm($_POST);
                $this->render('admin.oeuvre.add', compact('form', 'action', 'errors'));
                exit();
            }
            // Sinon $upload contient le nom du fichier uploadé.
            $result = $this->Oeuvre->create([
                'titre' => $_POST['titre'],
                'annee' => $_POST['annee'],
                'technique' => $_POST['technique'],
                'support' => $_POST['support'],
                'largeur' => $_POST['largeur'],
                'hauteur' => $_POST['hauteur'],
                'prix' => $_POST['prix'],
                'petiteImage' =>  $upload,
                'grandeImage' =>  $upload
            ]);
            if ($result) {
                header('Location: ?page=admin.oeuvre.index');
            }
        }
        $form = new BootstrapForm($_POST);
        $action = 'Création';
        $this->render('admin.oeuvre.add', compact('form', 'action'));
    }

    private function uploadImage()
    {
        $errors = [];
        $uploadOk = true;
        $target_file = \App\App::OEUVRE_PATH . basename($_FILES["file"]["name"]);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        $target_file = \App\App::OEUVRE_PATH . uniqid('img_') . '.' . $imageFileType;
        // On vérifie si le fichier est bien une image.
        $check = getimagesize($_FILES["file"]["tmp_name"]);
        if ($check === false) {
            $errors [] = "Le fichier fourni n'est pas une image.";
            $uploadOk = 0;
        }
        // On vérifie que le fichier n'éxiste pas déjà
        if (file_exists($target_file)) {
            $errors [] = "Désolé, il existe déjà un fichier portant ce nom.";
            $uploadOk = 0;
        }
        // On vérifie la taille du fichier
        if ($_FILES["file"]["size"] > 1000000) {
            $errors [] = "Désolé, le fichier fourni est trop volumineux.";
            $uploadOk = 0;
        }
        // On vérifie le format de fichier
        if ($imageFileType !== "jpg" && $imageFileType !== "png" && $imageFileType !== "jpeg"
            && $imageFileType !== "gif" ) {
            $errors [] = "Désolé, seuls les fichiers de type JPG, JPEG, PNG & GIF sont acceptés.";
            $uploadOk = 0;
        }

        if ($uploadOk === 0) {
            $errors [] = "Désolé, le fichier n'a pu être uploadé.";
            // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
                $messages [] = "Le fichier ". basename($_FILES["file"]["name"]). " a été uploadé correctement.";
            } else {
                $errors [] = "Désolé, il y a eu une erreur lors de l'upload du fichier.";
            }
        }

        if ($uploadOk) {
            return str_replace(\App\App::OEUVRE_PATH, '', $target_file);
        } else {
            return $errors;
        }
    }

    private function updateOeuvre()
    {
        return $this->Oeuvre->update($_GET['id'], [
            'titre' => $_POST['titre'],
            'annee' => $_POST['annee'],
            'technique' => $_POST['technique'],
            'support' => $_POST['support'],
            'largeur' => $_POST['largeur'],
            'hauteur' => $_POST['hauteur'],
            'prix' => $_POST['prix'],
        ]);
    }

    private function updateOeuvreWithFile($new_file)
    {
        $result = $this->Oeuvre->update($_GET['id'], [
            'titre' => $_POST['titre'],
            'annee' => $_POST['annee'],
            'technique' => $_POST['technique'],
            'support' => $_POST['support'],
            'largeur' => $_POST['largeur'],
            'hauteur' => $_POST['hauteur'],
            'prix' => $_POST['prix'],
            'petiteImage' => $new_file,
            'grandeImage' => $new_file
        ]);
        if ($result) {
            return true;
        }
        // Si la requête échoue: on fait le ménage
        unlink($new_file);
        return false;
    }

    public function edit()
    {
        $action = 'Edition';

        if (!empty($_POST) and
            isset(
                $_POST['titre'],
                $_POST['annee'],
                $_POST['technique'],
                $_POST['support'],
                $_POST['largeur'],
                $_POST['hauteur'],
                $_POST['prix']
            )
        ) {
            // Si une nouvelle image est postée
            if (!empty($_FILES["file"]["name"])) {
                // On tente d'uplodaer l'image
                $upload = $this->uploadImage();
                // Si il n'y a pas d'erreur lors de l'upload
                if (!is_array($upload)) {
                    $result = $this->updateOeuvreWithFile($upload);
                    if ($result === true) {
                        $this->index();
                    } else {
                        $errors = 'Une erreur s\'est produite';
                        // On redirige vers le formulaire d'ajout.
                        $this->render('admin.oeuvre.add', compact('form', 'action', 'old_file', 'errors'));
                    }
                } else {
                    // Erreur lors de l'upload
                    $errors = $upload;
                    $errors [] = 'L\'oeuvre n\'a pas été mise à jour';
                    $this->render('admin.oeuvre.add', compact('form', 'action', 'old_file', 'errors'));
                }
            } else {
                // Aucune image n'a été postée
                $result = $this->updateOeuvre();
                if ($result) {
                    $this->index();
                }
            }
        } else {
            // Si aucune valeur n'a été postée, on crée un formulaire contenant les infos de l'oeuvre
            $item = $this->Oeuvre->find($_GET['id']);
            // Si l'oeuvre existe alors on crée un formulaire contenant ses données
            if ($item) {
                $form = new BootstrapForm($item);
                $image = $item->petiteImage;
                $this->render('admin.oeuvre.add', compact('form', 'action', 'image'));
                exit();
            } else {
                // Sinon on renvoie en erreur
                $this->notFound();
                exit();
            }
        }
    }

    public function edits()
    {
        // Si rien n'a été posté
        if (empty($_POST)) {
            header('Location: ?page=admin.oeuvre.index');
        } elseif (count($_POST) >= 2) {
            $posted_elements = $_POST;
            // Suppression du champ submit dans le tableau
            array_pop($posted_elements);
            // passage d'un tableau de champs ('id', 'titre', ...) à un tableau d'oeuvres ( [0] => ['id', 'titre', ...]
            $oeuvres = Util::arrayAssocToNum($posted_elements);
            // On met à jour chaque oeuvre
            foreach ($oeuvres as $oeuvre) {
                $this->Oeuvre->update($oeuvre['id'], $oeuvre);
            }
            header('Location: ?page=admin.oeuvre.index');
        } else {
            // Création du formulaire d'update
            // Formatage de la clause IN (?, ?, ...)
            $in_elements = [];
            foreach ($_POST['id'] as $id) {
                $in_elements [] = '?';
            }
            $selection = '(' . implode(', ', $in_elements) . ')';
            // Recherche des oeuvres à modifier
            $items = $this->Oeuvre->query('SELECT * FROM oeuvre WHERE id IN ' . $selection, $_POST['id']);
            $forms = [];
            foreach ($items as $item) {
                $forms [] = new BootstrapForm($item);
            }
            $action = 'Edition';
            $this->render('admin.oeuvre.edits', compact('forms', 'action'));
        }
    }

    public function delete()
    {
        if (isset($_GET['id'], $_GET['token']) and
            \Core\Auth\Auth::validateCsrfToken($_GET['token'])
        ) {
            $this->Oeuvre->delete($_GET['id']);
            \Core\Auth\Auth::renewCsrfToken();
            $this->index();
        } else {
//            $this->forbidden();
        }
    }

    public function deletes()
    {
        if (isset($_GET['token'], $_POST['id']) and
            \Core\Auth\Auth::validateCsrfToken($_GET['token'])
        ) {
            foreach ($_POST['id'] as $id) {
                if (is_numeric($id)) {
                    $this->Oeuvre->delete($id);
                }
                header('Location: ?page=admin.oeuvre.index');
            }
        } else {
//            $this->forbidden();
        }
    }
}
