<?php $this->layout('template', ['title' => 'Tulevat tapahtumat']) ?>

<center><h1>Upcoming Tournaments!</h1></center>

<div class='tapahtumat'>
<?php

foreach ($tapahtumat as $tapahtuma) {

  $start = new DateTime($tapahtuma['tap_alkaa']);
  $end = new DateTime($tapahtuma['tap_loppuu']);

  echo "<div>";
    echo "<div>$tapahtuma[nimi]</div>";
    echo "<div>" . $start->format('j.n.Y') . "-" . $end->format('j.n.Y') . "</div>";
    echo "<div><a href='tapahtuma?id=" . $tapahtuma['idtapahtuma'] . "'>Information & details</a></div>";
  echo "</div>";

}

?>
</div>
