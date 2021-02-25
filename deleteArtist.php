<?php

require 'pdo.php';

//To delete a data from artist table

$artist_id=$_GET['artist_id'];

$sql = 'DELETE FROM artist WHERE artist_id=:artist_id';

$statement = $pdo->prepare($sql);

if($statement->execute([':artist_id' => $artist_id])) {
	header('Location:indexArtist.php');
}

?>