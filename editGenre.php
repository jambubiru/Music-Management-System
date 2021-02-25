<?php



require "pdo.php";
require "home.php";

//To edit or update data from genre list table

$genre_id=$_GET['genre_id'];

$sql='SELECT * FROM genre WHERE genre_id =:genre_id';

$statement= $pdo->prepare($sql);

$statement->execute([':genre_id' => $genre_id]);

$genre = $statement->fetch(PDO::FETCH_OBJ);



if(isset($_POST['name'])){

	$name=$_POST['name'];

	$sql ='UPDATE genre SET name=:name WHERE genre_id=:genre_id';
	$statement = $pdo->prepare($sql);
	if($statement->execute([':name' => $name, ':genre_id' => $genre_id ])){
		header("Location:indexGenre.php");

			}

}

?>


<!DOCTYPE html>
<html lang="en">
<head>
	<title>Update Genre</title>
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
				<label >Name: </label>
				<input value="<?= $genre->name;?>" type="text" name="name" >
			</div> 
		</p>
		<p>
			<div class="space" >
				<button type="submit" class="ui-button ui-widget ui-corner-all">Update Genre</button>
			</div>
		</p>
		</form>
	</div>
  </div>
</div>

</body>
</html>

    
 