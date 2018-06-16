<?php

namespace App\Entity;

use Core\Entity\Entity;

class ExpositionEntity extends Entity
{
    public function getUrl()
    {
        return '?page=exposition.show&id=' . $this->id;
    }
}
