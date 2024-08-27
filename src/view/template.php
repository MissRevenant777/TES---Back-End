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
      <div class="profile">
        <?php
          if (isset($_SESSION['user'])) {
            echo "<div>$_SESSION[user]</div>";
            echo "<div><a href='logout'>Logout</a></div>";
            if (isset($_SESSION['admin']) && $_SESSION['admin']) {
              echo "<div><a href='admin'>Administrator</a></div>";  
            }
          } else {
            echo "<div><a href='kirjaudu'>Login</a></div>";
          }
        ?>
      </div>
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
