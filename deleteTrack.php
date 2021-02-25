<?php

require 'pdo.php';

//To delete a data from track table

$track_id=$_GET['track_id'];

$sql = 'DELETE FROM track WHERE track_id=:track_id';

$statement = $pdo->prepare($sql);

if($statement->execute([':track_id' => $track_id])) {
	header('Location:indexTrack.php');
}

?>