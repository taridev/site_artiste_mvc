            
            <h1 class="text-center" style="margin-bottom: 50px;">Panneau de contrôle</h1>
            <div class="col-sm-6 col-xs-12">
                <div class="container-fluid">
                    <h2>Dernières oeuvres ajoutées</h2>
                    <p><a href="?page=admin.oeuvre.index">administer les oeuvres</a></p>
                    <div class="gal">
                    <?php foreach ($last_oeuvres as $oeuvre) :
                    ?>

                        <div class="container-overlay">
                            <img src="<?= \App\App::OEUVRE_PATH . $oeuvre->petiteImage; ?>" alt="Avatar" class="image">
                            <a href="?page=admin.oeuvre.edit&amp;id=<?= $oeuvre->id; ?>">
                                <div class="overlay">
                                    <div class="text">
                                        <span class="glyphicon glyphicon-pencil"></span>
                                    </div>
                                </div>
                            </a>
                        </div>
                    <?php endforeach; ?>

                    </div>
                </div>
            </div>

            <div class="col-sm-6 col-xs-12">
                <div class="row">
                    <h2>Dernières expositions ajoutées</h2>
                    <p><a href="?page=admin.exposition.index">administer les expositions</a></p>
                    <div class="container-fluid">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Titre</th>
                                    <th class="text-center col-xs-2"><span class="glyphicon glyphicon-cog"></span></th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($last_expositions as $expo) :
                            ?>

                                <tr class='clickable-row'
                                data-href='url://?page=admin.exposition.edit&amp;id=<?= $expo->id; ?>'>
                                    <td><?= $expo->id; ?></td>
                                    <td><?= $expo->nom; ?></td>
                                    <td class="text-center col-xs-2">
                                        <a href="?page=admin.exposition.edit&amp;id=<?= $expo->id; ?>"
                                        data-toggle="tooltip" title="Editer <?= $expo->nom; ?>"
                                        style="color: orange !important;">
                                            <span class="glyphicon glyphicon-pencil"></span>
                                        </a>
                                        <a href="?page=admin.exposition.delete&amp;id=<?= $expo->id; ?>" 
                                        data-toggle="tooltip" title="Supprimer <?= $expo->nom; ?>"
                                        style="color: red !important;">
                                            <span class="glyphicon glyphicon-erase"></span>
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>