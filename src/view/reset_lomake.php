<?php $this->layout('template', ['title' => 'Salasanan vaihtaminen']) ?>

<h1>Change the password</h1>

<form action="" method="POST">
  <div>
    <label for="salasana1">Password:</label>
    <input id="salasana1" type="password" name="salasana1">
  </div>
  <div>
    <label for="salasana2">Password again:</label>
    <input id="salasana2" type="password" name="salasana2">
  </div>
  <div>
    <div class="error"><?= $error ?></div>
  </div>
  <div>
    <input type="submit" name="laheta" value="Change the password">
  </div>
</form>
