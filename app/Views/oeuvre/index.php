
            <div class="gal">
            <?php foreach ($items as $oeuvre) :
            ?>

                <div class="container-overlay">
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
