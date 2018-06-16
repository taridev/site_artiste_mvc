<h1>Modifier l'image</h1>
<form method="post" enctype="multipart/form-data">

    <?= $form->file('file', 'Fichier', ['class' => 'col-xs-12']); ?>

    <?= $form->submit('Envoyer', ['class' => ['btn', 'btn-primary', 'btn-lg']]); ?>

</form>