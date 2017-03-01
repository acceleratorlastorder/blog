<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>blog test</title>
        <link rel="stylesheet" href="style.css">
  </head>
  <body>

    <h1><a href="index.php">Accueil</a></h1>
    <?php
$billet = $_GET['billet'];
     ?>
     <?php
     include_once('DBconnect.php');
     try {
         $dbh = new PDO('mysql:host=localhost;dbname=blogdb;charset=utf8', $dbuname, $dbpass); ?>
   <div class="">

         <?php
         foreach ($dbh->query('SELECT * FROM commentaires where id_billet = '.$billet) as $row) {
             ?>

   <div class="comment">
<div class="author">
 <p>auteur: <?php print_r($row['auteur']); ?></p>
</div>
<p>commentaire: <br> <?php print_r($row['commentaire']); ?></p>
</div>
             <?php

         } ?>
 </div>
<?php
         $dbh = null;
     } catch (PDOException $e) {
         print "Erreur !: " . $e->getMessage() . "<br/>";
         die();
     }
     ?>
     <form class="" action="newcomment.php" method="post">
       name: <input type="text" name="name"><br>
       comment: <textarea id="comment" type="text" name="comment" placeholder="Saisie libre"></textarea><br>
       <input type="hidden" name="billet" value="<?php echo $billet; ?>"></input>
     <button type="submit" name="button">submit</button>
     </form>


  </body>
</html>
