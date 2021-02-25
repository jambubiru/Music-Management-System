<?php


require "pdo.php";
require "home.php";

//To edit or update data from album list table

$album_id=$_GET['album_id'];

$sql='SELECT * FROM album WHERE album_id =:album_id';

$statement= $pdo->prepare($sql);

$statement->execute([':album_id' => $album_id]);

$album = $statement->fetch(PDO::FETCH_OBJ);



if(isset($_POST['title']) && isset($_POST['artist_id'])){

	$title=$_POST['title'];
	$artist_id=$_POST['artist_id'];
	$sql ='UPDATE album SET title=:title, artist_id=:artist_id WHERE album_id=:album_id';
	$statement = $pdo->prepare($sql);
	if($statement->execute([':title' => $title, ':artist_id' => $artist_id, ':album_id' =>$album_id ])){
		header("Location:indexAlbum.php");

			}

}

?>


<!DOCTYPE html>
<html lang="en">
<head>
	<title>Update Album</title>
</head>
<body>
<div class="container">

       <?php if(!empty($message)): ?>
       	<div >
       		<?= $message; ?>
       	</div>

        <?php endif; ?>

		<form method="post">
		<p>
			<div class="space">
				<label >Title: </label>
				<input value="<?= $album->title;?>" type="text" name="title" >
			</div> 
		</p>
			<div class="space">
				<label >Artist_Id</label>
				<input value="<?= $album->artist_id;?>"  type="number" name="artist_id" >
			</div>
		<p>
			<div class="space">
				<button type="submit" class="ui-button ui-widget ui-corner-all">Update Album</button>
			</div>
		</p>
		</form>
	</div>
  </div>
</div>

</body>
</html>

    
 