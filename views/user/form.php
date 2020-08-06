<?php

use App\HTML\Form;
use App\User\Users;

$error = [];
$user = new Users();
$form = new Form($user, $error);

?>
<p>Vous avez la possibilité de modifier le planning de <?= $user->getUsername(); ?></p>
<form>
    <div class="form-group">
        <?= $form->input('txt', 'test'); ?>
    </div>
</form>