<?php

require 'pdo.php';

//To delete a data from genre table

$genre_id=$_GET['genre_id'];

$sql = 'DELETE FROM genre WHERE genre_id=:genre_id';

$statement = $pdo->prepare($sql);

if($statement->execute([':genre_id' => $genre_id])) {
	header('Location:indexGenre.php');
}

?>