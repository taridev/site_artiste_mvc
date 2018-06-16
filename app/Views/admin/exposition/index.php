            
            <h1 class="text-center">Table des expositions</h1>
            <div class="container">
                <form method="post">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th><input type="checkbox"></th>
                                <th>ID</th>
                                <th>nom</th>
                                <th>lieu</th>
                                <th>adresse</th>
                                <th>date début</th>
                                <th>date fin</th>
                                <th>date vernissage</th>
                                <th class="text-center">
                                    <span class="glyphicon glyphicon-cog"></span>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($items as $exposition) :
                            ?>

                            <tr style="vertical-align: middle !important;">
                                <td><input type="checkbox"></td>
                                <td>
                                    <?= $exposition->id; ?>
                                </td>
                                <td>
                                    <?= $exposition->nom; ?>
                                </td>
                                <td>
                                    <?= $exposition->lieu; ?>
                                </td>
                                <td>
                                    <?= $exposition->adresse; ?>
                                </td>
                                <td>
                                    <?= $exposition->dateDebut; ?>
                                </td>
                                <td>
                                    <?= $exposition->dateFin; ?>
                                </td>
                                <td>
                                    <?= $exposition->dateVernissage; ?>
                                </td>
                                <td class="text-center">
                                    <a class="btn btn-xs btn-info" data-toggle="tooltip" title="Modifier les oeuvres"
                                       href="?page=admin.exposition.manage&amp;id=<?= $exposition->id; ?>" >
                                        <span class="glyphicon glyphicon-picture"></span>
                                    </a>
                                    <a class="btn btn-xs btn-warning" data-toggle="tooltip" title="Editer"
                                    href="?page=admin.exposition.edit&amp;id=<?= $exposition->id; ?>">
                                        <span class="glyphicon glyphicon-pencil"></span>
                                    </a>
                                    <a class="btn btn-xs btn-danger" data-toggle="tooltip" title="Supprimer"
                                    href="?page=admin.exposition.delete&amp;id=<?= $exposition->id; ?>" >
                                        <span class="glyphicon glyphicon-erase"></span>
                                    </a>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td>
                                    <input type="checkbox">
                                </td>
                                <td colspan="7">
                                        <em>Avec la selection : </em>
                                        <button class="btn btn-xs btn-warning" id="edit-selection">
                                            <span class="glyphicon glyphicon-pencil"></span>
                                        </button>
                                        <button class="btn btn-xs btn-danger" id="delete-selection">
                                            <span class="glyphicon glyphicon-erase"></span>
                                        </button>
                                </td>
                                <td>
                                    <p class="text-center">
                                        <a href="?page=admin.exposition.add" class="btn btn-sm btn-primary">
                                            <span class="glyphicon glyphicon-plus"></span>&nbsp;Ajouter
                                        </a>
                                    </p>
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </form>
            </div>