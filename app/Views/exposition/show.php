<?php

use App\App;

App::getInstance()->title = $exposition->nom . ' | '. App::getInstance()->title;
?>

            <div class="col-md-12">
                <h2>
                    [<?= $exposition->id; ?>] <?= $exposition->nom; ?> - 
                    <?= $exposition->lieu ?> - 
                    <?= $exposition->adresse; ?> euros
                </h2>
                <p>
                    Date de début : <?= $exposition->dateDebut; ?>.  
                    Date de fin : <?= $exposition->dateFin; ?>. 
                    Date du vernissage : <?= $exposition->dateVernissage; ?>.
                </p>

                <div class="row">
                    <div class="gal">
                    <?php foreach ($exposition->oeuvres as $oeuvre) :
                    ?>

                        <div class="container-overlay zoom">
                            <img src="<?= \App\App::OEUVRE_PATH . $oeuvre->petiteImage; ?>" alt="Avatar" class="image">
                            <a href="?page=oeuvre.show&amp;id=<?= $oeuvre->id; ?>">
                                <div class="overlay">
                                    <div class="text">
                                        <span class="glyphicon glyphicon-search"></span>
                                    </div>
                                </div>
                            </a>
                        </div>
                    <?php endforeach; ?>

                    </div>

                </div>

            </div>
