<?php

    use \App\App;

    App::getInstance()->title = $item->titre . ' | ' . App::getInstance()->title;
?>
            <div class="container">
                <h2>
                    [<?= $item->id; ?>] <?= $item->titre; ?> - 
                    <?= $item->annee ?> - <?= $item->prix; ?> euros
                </h2>
                <p><?= $item->technique .' sur '. $item->support; ?> : 40cm X 50cm</p>
                <p>
                    <img class="img-responsive"
                        src="<?= \App\App::OEUVRE_PATH . $item->grandeImage ?>" alt="aperçu de <?= $item->titre; ?>">
                </p>
            </div>