<?php if ($errors) :?>

            <div class="alert alert-danger">
                Le login et le mot de passe ne correspondent pas.
            </div>
<?php endif; ?>

            <form method="post">               
                <?= $form->input('login', 'Login', ['class' => 'input-lg']); ?>
                
                <?= $form->input('password', 'mot de passe', ['type' => 'password', 'class' => 'input-lg']); ?>
                
                <?= $form->submit('Envoyer', ['class' => ['btn', 'btn-primary', 'btn-lg']]); ?>
                
            </form>
