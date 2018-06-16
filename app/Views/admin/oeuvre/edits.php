
            <h1 class="text-center"><?= $action ?> d'oeuvres</h1>

            <form method="post">
                <?php foreach ($forms as $key => $form) :
                ?>

                <?= $form->hidden('id[]'); ?>

                <?= $form->input('titre[]', 'Titre'); ?>

                <?= $form->input('annee[]', 'Année', ['type' => 'number']); ?>

                <?= $form->input('technique[]', 'Technique'); ?>
                
                <?= $form->input('support[]', 'Support'); ?>
                
                <?= $form->input('largeur[]', 'Largeur', ['type' => 'number']); ?>
                
                <?= $form->input('hauteur[]', 'Hauteur', ['type' => 'number']); ?>
                
                <?= $form->input('prix[]', 'Prix', ['type' => 'number']); ?>


                <?php
                $class = ['btn', 'btn-primary'];
                if ($key == (count($forms) - 1)) {
                    $class [] = 'btn-lg';
                }
                echo $form->submit('Sauvegarder', ['class' => $class]);
                ?>
                <?php endforeach; ?>


            </form>
