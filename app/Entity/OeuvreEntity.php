<?php

namespace App\Entity;

use Core\Entity\Entity;

class OeuvreEntity extends Entity
{
    public function getUrl()
    {
        return '?page=oeuvre.show&id=' . $this->id;
    }
}
