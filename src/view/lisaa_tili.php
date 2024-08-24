<?php $this->layout('template', ['title' => 'Uuden tilin luonti']) ?>

<h1>Sign up</h1>

<form action="" method="POST">
  <div>
    <label for="nimi">Full name:</label>
    <input id="nimi" type="text" name="nimi">
  </div>
  <div>
    <label for="alias">Gaming alias:</label>
    <input id="alias" type="text" name="alias">
  </div>
  <div>
    <label for="maa">Country:</label>
    <input id="maa" type="text" name="maa">
  </div>
  <div>
    <label for="discord">Discord-ID:</label>
    <input id="discord" type="text" name="discord">
  </div>
  <div>
    <label for="email">Email:</label>
    <input id="email" type="email" name="email">
  </div>
  <div>
    <label for="salasana1">Password:</label>
    <input id="salasana1" type="password" name="salasana1">
  </div>
  <div>
    <label for="salasana2">Password:</label>
    <input id="salasana2" type="password" name="salasana2">
  </div>
  <div>
    <input type="submit" name="laheta" value="Create Account">
  </div>
</form>
