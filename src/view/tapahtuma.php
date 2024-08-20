<?php $this->layout('template', ['title' => $tapahtuma['nimi']]) ?>

<?php
  $start = new DateTime($tapahtuma['tap_alkaa']);
  $end = new DateTime($tapahtuma['tap_loppuu']);
?>

<h1><?=$tapahtuma['nimi']?></h1>
<div><?=$tapahtuma['kuvaus']?></div>
<div>Tournament starts: <?=$start->format('j.n.Y G:i')?></div>
<div>Tournament ends: <?=$end->format('j.n.Y G:i')?></div>
