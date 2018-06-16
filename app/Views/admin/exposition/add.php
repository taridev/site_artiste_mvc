
            <h1 class="text-center"><?= $action ?> d'une exposition</h1>

            <form method="post" >
                <?= $form->input('nom', 'Nom', ['class' => 'input-lg']); ?>

                <?= $form->input('lieu', 'Lieu', ['class' => 'input-lg']); ?>

                <?= $form->input('adresse', 'Adresse', ['class' => 'input-lg']); ?>
                
                <?= $form->input('dateDebut', 'Date de début', ['type' => 'date', 'class' => 'input-lg']); ?>
                
                <?= $form->input('dateFin', 'Date de fin', ['type' => 'date', 'class' => 'input-lg']); ?>
                
                <?= $form->input('dateVernissage', 'Date de Vernissage', ['type' => 'date', 'class' => 'input-lg']); ?>

                <?= $form->input('timeVernissage', 'Heure de Vernissage', ['type' => 'time', 'class' => 'input-lg']); ?>

                <?= $form->submit('Sauvegarder', ['class' => ['btn', 'btn-primary']]); ?>

            </form>
