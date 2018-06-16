<?php

use App\App;

App::getInstance()->title = 'Exposition | '. App::getInstance()->title;
?>

        <?php foreach ($items as $item) :?>
            <div class="container">
                <h2>
                    <a href="<?= $item->getUrl(); ?>">
                        [<?= $item->id; ?>] <?= $item->nom; ?> - 
                        <?= $item->lieu ?> - 
                        <?= $item->adresse; ?> euros
                    </a>
                </h2>
                <p>
                    Date de début : <?= $item->dateDebut; ?>.  
                    Date de fin : <?= $item->dateFin; ?>. 
                    Date du vernissage : <?= $item->dateVernissage; ?>.
                </p>
            </div>
        <?php endforeach; ?>
