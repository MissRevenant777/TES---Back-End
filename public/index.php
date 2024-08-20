<?php

  // Suoritetaan projektin alustusskripti.
  require_once '../src/init.php';

  // Siistitään polku urlin alusta ja mahdolliset parametrit urlin lopusta.
  // Siistimisen jälkeen osoite /~jmakijaa/nayttotyo/tapahtuma?id=1 on 
  // lyhentynyt muotoon /tapahtuma.
  $request = str_replace($config['urls']['baseUrl'],'',$_SERVER['REQUEST_URI']);
  $request = strtok($request, '?');

  // Selvitetään mitä sivua on kutsuttu ja suoritetaan sivua vastaava 
  // käsittelijä.
  if ($request === '/' || $request === '/tapahtumat') {
    echo '<h1>Upcoming tournaments</h1>';
  } else if ($request === '/tapahtuma') {
    echo '<h1>Tournament information</h1>';
  } else {
    echo '<h1>The page you requested could not be found! </h1>';
  }

?> 
