<?php

namespace App\Table;

use Core\Table\Table;

class OeuvreTable extends Table
{

    protected $table = 'oeuvre';


    /**
     * Récupère la liste des oeuvres
     *
     * @return \App\Entity\OeuvreEntity
     */
    public function all()
    {
        return $this->query('SELECT * FROM '. $this->table);
    }

    /**
     * Récupère une oeuvre
     *
     * @param int $id
     * @return \App\Entity\OeuvreEntity
     */
    public function find($id)
    {
        return $this->query(
            "SELECT * FROM ". $this->table . " WHERE id=?",
            [$id],
            true
        );
    }

    public function findByExpositionId($id)
    {
        return $this->query(
            'SELECT id, titre, annee, technique, support, largeur, hauteur, oeuvre.prix, petiteImage, grandeImage
            FROM OEUVRE
            JOIN OEUVRE_EXPOSEE oe ON oe.id_oeuvre = id
            WHERE oe.id_exposition = ?',
            [$id]
        );
    }
}
