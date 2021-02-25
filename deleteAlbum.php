<?php

require 'pdo.php';

//To delete a data from album table

$album_id=$_GET['album_id'];

$sql = 'DELETE FROM album WHERE album_id=:album_id';

$statement = $pdo->prepare($sql);

if($statement->execute([':album_id' => $album_id])) {
	header('Location:indexAlbum.php');
}

?>