
            <h1 class="text-center"><?= $action ?> d'une oeuvre</h1>
            <?php if (isset($errors)) :
            ?>
            <div class="alert alert-danger">
                <ul>
                    <?php foreach ($errors as $error) :
                    ?>

                    <li><?= $error; ?></li>
                    <?php endforeach; ?>

                </ul>
            </div>
            <?php endif;
            ?>

            <div>
                <form method="post" enctype="multipart/form-data" class="container-fluid">
                    <div class="col-sm-9">
                    <?= $form->input('titre', 'Titre', ['class' => 'input-lg']); ?>
                    <?php if (!isset($image)) :
                    ?>


                        <label class="form-group fileContainer btn btn-primary btn-lg">
                            <span class="glyphicon glyphicon-folder-open"></span>&nbsp;&nbsp;Parcourir
                            <input type="file" name="file"/>
                        </label>
                    <?php endif; ?>

                    <?= $form->input('annee', 'Année', ['type' => 'number', 'class' => 'input-lg']); ?>

                    <?= $form->input('technique', 'Technique', ['class' => 'input-lg']); ?>
                    
                    <?= $form->input('support', 'Support', ['class' => 'input-lg']); ?>
                    
                    <?= $form->input('largeur', 'Largeur', ['type' => 'number', 'class' => 'input-lg']); ?>
                    
                    <?= $form->input('hauteur', 'Hauteur', ['type' => 'number', 'class' => 'input-lg']); ?>
                    
                    <?= $form->input('prix', 'Prix', ['type' => 'number', 'class' => 'input-lg']); ?>

                    </div>



                    <?php if (isset($image)) :
                    ?>
                    <div class="col-sm-3" style="margin-top: 25px;">
                        <p><img width="100%" alt="Aperçu de l'image" src="<?= \App\App::OEUVRE_PATH . $image; ?>"></p>

                        <label class="fileContainer btn btn-primary btn-block">
                            <span class="glyphicon glyphicon-folder-open"></span>&nbsp;&nbsp;Parcourir
                            <input type="file" name="file"/>
                        </label>
                    </div>

                    <?php endif; ?>

                    <div class="col-xs-12">
                    <?= $form->submit('Sauvegarder', ['class' => ['btn', 'btn-primary', 'btn-lg']]); ?>
                    </div>
                </form>
            </div>
