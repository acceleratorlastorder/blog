<?php
$name = $_POST['name'];
$comment = $_POST['comment'];
$billet = $_POST['billet'];
include_once('DBconnect.php');
try {
    $dbh = new PDO('mysql:host=localhost;dbname=blogdb;charset=utf8', $dbuname, $dbpass);
    $stmt = $dbh->prepare('INSERT INTO commentaires (id_billet, auteur, commentaire, date_commentaire)
				VALUES (:billet, :name, :comment, now());');
    $stmt->bindParam(':billet', $billet);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':comment', $comment);
    $stmt->execute();
} catch (PDOException $e) {
    print "Erreur !: " . $e->getMessage() . "<br/>";
    die();
}

header('Location: commentaires.php?billet='.$billet);
?>
