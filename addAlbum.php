<?php

require "pdo.php";
require "home.php";

$message='';

//To add new data into album table

if( isset($_POST['title']) && isset($_POST['artist_id'])){

    $title=$_POST['title'];
    $artist_id=$_POST['artist_id'];

    $sql ='INSERT INTO album (title, artist_id)
               VALUES (:title, :artist_id)';
    $statement = $pdo->prepare($sql);
    if($statement->execute([':title' => $title, ':artist_id' => $artist_id])){

        $message = 'Data inserted successfully, check in Album List';
    }

}

?>


<!DOCTYPE html>
<html lang="en">
<head>
	<title>Add Album</title>
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
                <label  >Title: </label>
                <input type="text" name="title" required>
            </div>
        </p>
        <p>
            <div class="space">
                <label >Artist_Id: </label>
                <input type="number" name="artist_id" required>
            </div>
        </p>
        <p>
            <div class="space" >
                <button type="submit" class="ui-button ui-widget ui-corner-all">Add Album</button>
            </div>
        </p>
        </form>
</div>
</body>
</html>
