<?php $this->layout('template', ['title' => 'Unohtunut salasana']) ?>

<h1>Forgot your password?</h1>

<p>You can reset the password by filling out the form below. You will receive new verification link. Click it and follow the instructions.</p>

<form action="" method="POST">
  <div>
    <label for="email">Email:</label>
    <input id="email" type="email" name="email">
  </div>
  <div>
    <input type="submit" name="laheta" value="Send me verification link">
  </div>
</form>
