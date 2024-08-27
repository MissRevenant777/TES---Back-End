<?php $this->layout('template', ['title' => 'Kirjautuminen']) ?>

<h1>Login</h1>

<form action="" method="POST">
  <div>
    <label>Email:</label>
    <input type="text" name="email">
  </div>
  <div>
    <label>Password:</label>
    <input type="password" name="salasana">
  </div>
  <div class="error"><?= getValue($error,'virhe'); ?></div>
  <div>
    <input type="submit" name="laheta" value="Login">
  </div>
</form>

<div class="info">If you don't have an account, you can create one <a href="lisaa_tili">here</a>.</div>
