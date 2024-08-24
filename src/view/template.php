<!DOCTYPE html>
<html lang="fi">
  <head>
    <title>nayttotyo - <?=$this->e($title)?></title>
    <meta charset="UTF-8">    
    <link href="styles/styles.css" rel="stylesheet">
  </head>
  <body>
    <header>
      <h1><a href="<?=BASEURL?>">Apex Legends Champion Tournaments</a></h1>
    </header>
    <section>
      <?=$this->section('content')?>
    </section>
    <footer>
      <hr>
      <div>näyttötyö by MissRevenant</div>
    </footer>
  </body>
</html>
