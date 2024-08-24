<?php

  require_once HELPERS_DIR . 'DB.php';

  function lisaaHenkilo($nimi,$alias,$maa,$discord,$email,$salasana) {
    DB::run('INSERT INTO henkilo (nimi, alias, maa, discord, email, salasana) VALUE  (?,?,?,?,?,?);',[$nimi,$alias,$maa,$discord,$email,$salasana]);
    return DB::lastInsertId();
  }

?>
