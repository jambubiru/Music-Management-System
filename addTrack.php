<?php

require "pdo.php";
require "home.php";

//To add new data into track table

$message='';

if(isset($_POST['title'])
     && isset($_POST['len']) && isset($_POST['rating'])&& isset($_POST['count']) && isset($_POST['album_id'])&& isset($_POST['genre_id'])){

    $title=$_POST['title'];
    $len=$_POST['len'];
    $rating=$_POST['rating'];
    $count=$_POST['count'];
    $album_id=$_POST['album_id'];
    $genre_id=$_POST['genre_id'];
    $sql ='INSERT INTO track (title, len, rating, count, album_id, genre_id)
               VALUES (:title, :len, :rating, :count, :album_id, :genre_id)';
    $statement = $pdo->prepare($sql);
    if($statement->execute([':title' => $title, ':len' => $len, ':rating' => $rating, ':count' => $count, ':album_id' => $album_id, ':genre_id' => $genre_id])){

        $message = 'Data inserted successfully, check in Track List :)';
    }

}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <title>Add Track</title>
</head>
<body>
<div class="container">

       <?php if(!empty($message)): ?>
        <div>
            <?= $message; ?>
            <br>
        </div>

        <?php endif; ?>

        <form  method="post">
        <p>
            <div class ="space">
                <label >Title    : </label>
                <input type="text" name="title" required>
            </div>
        </p>
        <p>
            <div class ="space">
                <label >Len      : </label>
                <input type="number" name="len" required >
            </div>
        </p>
                <p>
            <div class ="space">
                <label >Rating   : </label>
                <input type="number" name="rating"required >
            </div>
        </p>
                <p>
            <div class ="space">
                <label >Count    : </label>
                <input type="number" name="count" required>
            </div>
        </p>
                <p>
            <div class ="space">
                <label >Album_Id : </label>
                <input type="number" name="album_id" required>
            </div>
        </p>
                <p>
            <div class ="space">
                <label >Genre_Id :</label>
                <input type="number" name="genre_id" class="arrange">
            </div>
        </p>
        <p>
            <div class="space">
                <button type="submit" class="ui-button ui-widget ui-corner-all">Add Track</button>
            </div>
        </p>
        </form>
</div>
</body>
</html>
