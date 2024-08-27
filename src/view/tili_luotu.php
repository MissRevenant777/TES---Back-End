
<?php $this->layout('template', ['title' => 'Tili luotu']) ?>

<h1>A new account has been created for you!</h1>

<p>You must confirm your email address before you can login. (<?= getValue($formdata,'email') ?>) Please check your email. To confirm your email address, click the link you received.</p>
