<?php

namespace App\Table;

use Core\Table\Table;

class ExpositionTable extends Table
{

    protected $table = 'exposition';

    /**
     * Récupère la liste des expositions
     *
     * @return \App\Entity\OeuvreEntity
     */
    public function all()
    {
        return $this->query('SELECT * FROM '. $this->table);
    }

    /**
     * Récupère une exposition
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

    /**
     * @param $id
     * @return array
     */
    public function findWithOeuvresId($id)
    {
        return $this->query(
            "SELECT id, nom, lieu, adresse, dateDebut, dateFin, dateVernissage, id_oeuvre
            FROM exposition
            JOIN oeuvre_exposee ON id = id_exposition
            WHERE id =?",
            [$id],
            false
        );
    }
}
