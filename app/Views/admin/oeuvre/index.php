<?php
    $token = \Core\Auth\Auth::getCsrfToken();
?>
            <h1 class="text-center">Table des oeuvres</h1>
            <div class="container">
                <form method="post">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>
                                    <input type="checkbox" data-toggle="tooltip" title="Tout sélectionner">
                                </th>
                                <th>ID</th>
                                <th>titre</th>
                                <th>année</th>
                                <th>technique</th>
                                <th>support</th>
                                <th>dimensions</th>
                                <th>prix</th>
                                <th class="text-center">aperçu</th>
                                <th class="text-center">
                                    <span class="glyphicon glyphicon-cog"></span>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($items as $oeuvre) :
                            ?>

                            <tr style="vertical-align: middle !important;">
                                <td>
                                    <input type="checkbox" name="id[]" value="<?= $oeuvre->id; ?>">
                                </td>
                                <td>
                                    <?= $oeuvre->id; ?>
                                </td>
                                <td>
                                    <?= $oeuvre->titre; ?>
                                </td>
                                <td>
                                    <?= $oeuvre->annee; ?>
                                </td>
                                <td>
                                    <?= $oeuvre->technique; ?>
                                </td>
                                <td>
                                    <?= $oeuvre->support; ?>
                                </td>
                                <td>
                                    <?= $oeuvre->largeur . 'x' . $oeuvre->hauteur; ?>
                                </td>
                                <td>
                                    <?= $oeuvre->prix; ?>
                                </td>
                                <td class="text-center grow">
                                    <img height="20" src="<?= \App\App::OEUVRE_PATH . $oeuvre->petiteImage; ?>"
                                    alt="miniature de <?= $oeuvre->titre; ?>">
                                </td>
                                <td class="text-center">
                                    <a data-toggle="tooltip" title="Editer" class="btn btn-xs btn-warning"
                                       href="?page=admin.oeuvre.edit&amp;id=<?= $oeuvre->id .'&amp;token='. $token; ?>">
                                        <span class="glyphicon glyphicon-pencil"></span>
                                    </a>
                                    <a data-toggle="tooltip" title="Supprimer" class="btn btn-xs btn-danger"
                                    href="?page=admin.oeuvre.delete&amp;id=<?= $oeuvre->id .'&amp;token='. $token; ?>">
                                        <span class="glyphicon glyphicon-erase"></span>
                                    </a>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td>
                                    <input type="checkbox" data-toggle="tooltip" title="Tout sélectionner">
                                </td>
                                <td colspan="8">
                                    <em>Avec la selection : </em>
                                    <button type="submit" formaction="?page=admin.oeuvre.edits"
                                    class="btn btn-xs btn-warning" data-toggle="tooltip" title="Editer la sélection">
                                        <span class="glyphicon glyphicon-pencil"></span>
                                    </button>
                                    <button type="submit" formaction="?page=admin.oeuvre.deletes&amp;token=<?= $token; ?>"
                                    class="btn btn-xs btn-danger" data-toggle="tooltip" title="Supprimer la sélection">
                                        <span class="glyphicon glyphicon-erase"></span>
                                    </button>
                                </td>
                                <td>
                                    <p class="text-center">
                                        <a href="?page=admin.oeuvre.add"
                                            class="btn btn-primary btn-sm btn-primary">
                                            <span class="glyphicon glyphicon-plus"></span>&nbsp;Ajouter
                                        </a>
                                    </p>
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </form>
            </div>