<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Blog test</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
<h1><a href="index.php">Accueil</a></h1>
<?php
include_once('DBconnect.php');
try {
	$dbh = new PDO('mysql:host=localhost;dbname=blogdb;charset=utf8', $dbuname, $dbpass); ?>
		<div class="">

		<?php
		foreach ($dbh->query('SELECT * FROM billets ORDER BY id DESC LIMIT 0, 5') as $row) {
			?>

				<div class="comment">
				<div class="author">
				<p><?php print_r($row['titre']); ?></p>
				</div>
				<p><?php print_r($row['contenu']); ?></p>
				<a href="commentaires.php?billet=<?php echo $row['id']; ?>">Commentaires</a>
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

</body>
</html>
