<?php

function lisaaTili($formdata) {

  // Tuodaan henkilo-mallin funktiot, joilla voidaan lisätä
  // henkilön tiedot tietokantaan.
  require_once(MODEL_DIR . 'henkilo.php');

  // Alustetaan virhetaulukko, joka palautetaan lopuksi joko
  // tyhjänä tai virheillä täytettynä.
  $error = [];

  // Seuraavaksi tehdään lomaketietojen tarkistus. Tarkistusten
  // periaate on jokaisessa kohdassa sama. Jos kentän arvo
  // ei täytä tarkistuksen ehtoja, niin error-taulukkoon
  // lisätään virhekuvaus. Lopussa error-taulukko on tyhjä, jos
  // kaikki kentät menivät tarkistuksesta lävitse.

  // Tarkistetaan onko nimi määritelty ja se täyttää mallin.
  if (!isset($formdata['nimi']) || !$formdata['nimi']) {
    $error['nimi'] = "Enter your name.";
  } else {
    if (!preg_match("/^[- '\p{L}]+$/u", $formdata["nimi"])) {
      $error['nimi'] = "Enter your name without special characters.";
    }
  }

  // Tarkistetaan onko alias määritelty ja se täyttää mallin.
  if (!isset($formdata['alias']) || !$formdata['alias']) {
    $error['alias'] = "Enter your alias.";
  } else {
    if (!preg_match("/^[- '\p{L}]+$/u", $formdata["alias"])) {
      $error['alias'] = "Enter your alias without special character.";
    }
  }

  // Tarkistetaan onko maa määritelty ja se täyttää mallin.
  if (!isset($formdata['maa']) || !$formdata['maa']) {
    $error['maa'] = "Enter your country.";
  } else {
    if (!preg_match("/^[- '\p{L}]+$/u", $formdata["maa"])) {
      $error['maa'] = "Enter your country without special characters.";
    }
  }

  // Tarkistetaan, että discord-tunnus on määritelty ja se on
  // muodossa tunnus#0000.
  if (!isset($formdata['discord']) || !$formdata['discord']) {
    $error['discord'] = "Enter Your Discord-ID.";
  } else {
    if (!preg_match("/^.+#\d{4}$/",$formdata['discord'])) {
      $error['discord'] = "Wrong Discord-ID form.";
    }
  }

  // Tarkistetaan, että sähköpostiosoite on määritelty ja se on
  // oikeassa muodossa.
  if (!isset($formdata['email']) || !$formdata['email']) {
    $error['email'] = "Enter your email.";
  } else {
    if (!filter_var($formdata['email'], FILTER_VALIDATE_EMAIL)) {
      $error['email'] = "Wrong email form.";
    }
  }

  // Tarkistetaan, että kummatkin salasanat on annettu ja että
  // ne ovat keskenään samat.
  if (isset($formdata['salasana1']) && $formdata['salasana1'] &&
      isset($formdata['salasana2']) && $formdata['salasana2']) {
    if ($formdata['salasana1'] != $formdata['salasana2']) {
      $error['salasana'] = "Password is not matching!";
    }
  } else {
    $error['salasana'] = "Please, enter the password.";
  }

  // Lisätään tiedot tietokantaan, jos edellä syötettyissä
  // tiedoissa ei ollut virheitä eli error-taulukosta ei
  // löydy virhetekstejä.
  if (!$error) {

    // Haetaan lomakkeen tiedot omiin muuttujiinsa.
    // Salataan salasana myös samalla.
    $nimi = $formdata['nimi'];
    $email = $formdata['email'];
    $discord = $formdata['discord'];
    $salasana = password_hash($formdata['salasana1'], PASSWORD_DEFAULT);

    // Lisätään henkilö tietokantaan. Jos lisäys onnistui,
    // tulee palautusarvona lisätyn henkilön id-tunniste.
    $idhenkilo = lisaaHenkilo($nimi,$alias,$maa,$discord,$email,$salasana);

    // Palautetaan JSON-tyyppinen taulukko, jossa:
    //  status   = Koodi, joka kertoo lisäyksen onnistumisen.
    //             Hyvin samankaltainen kuin HTTP-protokollan
    //             vastauskoodi.
    //             200 = OK
    //             400 = Bad Request
    //             500 = Internal Server Error
    //  id       = Lisätyn rivin id-tunniste.
    //  formdata = Lisättävän henkilön lomakedata. Sama, mitä
    //             annettiin syötteenä.
    //  error    = Taulukko, jossa on lomaketarkistuksessa
    //             esille tulleet virheet.

    // Tarkistetaan onnistuiko henkilön tietojen lisääminen.
    // Jos idhenkilo-muuttujassa on positiivinen arvo,
    // onnistui rivin lisääminen. Muuten liäämisessä ilmeni
    // ongelma.
    if ($idhenkilo) {
      return [
        "status" => 200,
        "id"     => $idhenkilo,
        "data"   => $formdata
      ];
    } else {
      return [
        "status" => 500,
        "data"   => $formdata
      ];
    }

  } else {

    // Lomaketietojen tarkistuksessa ilmeni virheitä.
    return [
      "status" => 400,
      "data"   => $formdata,
      "error"  => $error
    ];

  }
}

?>
