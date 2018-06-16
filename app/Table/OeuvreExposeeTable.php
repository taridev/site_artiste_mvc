<?php

namespace App\Table;

use Core\Table\Table;

class OeuvreExposeeTable extends Table
{

    protected $table = 'oeuvre_exposee';

    /**
     * Récupère une exposition
     *
     * @param int $id
     * @return null
     */
    public function find($id)
    {
        return null;
    }

    /**
     * @param $id id de l'exposition
     * @return array
     */
    public function findOeuvresByExposition($id)
    {
        $exposition = $this->query(
            'SELECT * FROM EXPOSITION
            WHERE id=?',
            [$id],
            true
        );
        if ($exposition) {
            $exposition->oeuvres = $this->query(
                'SELECT id, titre, annee, technique, support, largeur, hauteur, oeuvre.prix, petiteImage, grandeImage
                FROM OEUVRE
                JOIN OEUVRE_EXPOSEE ON id = id_oeuvre
                WHERE id_exposition=?',
                [$id],
                false
            );
            return $exposition;
        }
        return null;
    }
}
