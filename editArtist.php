<?php


require "pdo.php";
require "home.php";

//To edit or update data from artist list table

$artist_id=$_GET['artist_id'];

$sql='SELECT * FROM artist WHERE artist_id =:artist_id';

$statement= $pdo->prepare($sql);

$statement->execute([':artist_id' => $artist_id]);

$artist = $statement->fetch(PDO::FETCH_OBJ);



if(isset($_POST['name'])){

	$name=$_POST['name'];

	$sql ='UPDATE artist SET name=:name WHERE artist_id=:artist_id';
	$statement = $pdo->prepare($sql);
	if($statement->execute([':name' => $name, ':artist_id' => $artist_id ])){
		header("Location:indexArtist.php");

			}

}

?>


<!DOCTYPE html>
<html lang="en">
<head>
	<title>Update Artist</title>
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
			<div class="space" >
				<label >Name: </label>
				<input value="<?= $artist->name;?>" type="text" name="name" >
			</div> 
		</p>
		<p>
			<div class="space">
				<button type="submit" class="ui-button ui-widget ui-corner-all">Update Artist</button>
			</div>
		</p>
		</form>
	</div>
  </div>
</div>

</body>
</html>

    
 