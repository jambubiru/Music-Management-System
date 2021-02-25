<?php



require "pdo.php";
require "home.php";

//To edit or update data from track list table

$track_id=$_GET['track_id'];

$sql='SELECT * FROM track WHERE track_id =:track_id';

$statement= $pdo->prepare($sql);

$statement->execute([':track_id' => $track_id]);

$track = $statement->fetch(PDO::FETCH_OBJ);



if(isset($_POST['title']) && isset($_POST['len']) && isset($_POST['rating']) && isset($_POST['count']) && isset($_POST['album_id']) && isset($_POST['genre_id'])){

    $title=$_POST['title'];
    $len=$_POST['len'];
    $rating=$_POST['rating'];
    $count=$_POST['count'];
    $album_id=$_POST['album_id'];
    $genre_id=$_POST['genre_id'];

    $sql ='UPDATE track SET title=:title, len=:len, rating=:rating, count=:count, album_id=:album_id, genre_id=:genre_id WHERE track_id=:track_id';
    $statement = $pdo->prepare($sql);
    if($statement->execute([':title' => $title, ':len' => $len, ':rating' => $rating, ':count' => $count, ':album_id' => $album_id, ':genre_id' => $genre_id, ':track_id' => $track_id ])){
        header("Location:indexTrack.php");

            }

}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <title>Update Track</title>
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
                <label >Title</label>
                <input value="<?= $track->title;?>" type="text" name="title" >
            </div> 
        </p>
        <p>
            <div class="space" >
                <label >Len</label>
                <input value="<?= $track->len;?>"  type="number" name="len" >
            </div>
        </p>
                <p>
            <div class="space">
                <label >Rating</label>
                <input value="<?= $track->rating;?>" type="number" name="rating" >
            </div> 
        </p>
                <p>
            <div class="space" >
                <label >Count</label>
                <input value="<?= $track->count;?>" type="number" name="count" >
            </div> 
        </p>
                <p>
            <div  class="space">
                <label >Album_Id</label>
                <input value="<?= $track->album_id;?>" type="number" name="album_id" >
            </div> 
        </p>
                <p>
            <div class="space">
                <label >Genre_Id</label>
                <input value="<?= $track->genre_id;?>" type="number" name="genre_id" >
            </div> 
        </p>
        <p>
            <div class="space">
                <button type="submit" class="ui-button ui-widget ui-corner-all">Update Track</button>
            </div>
        </p>
        </form>
    </div>
  </div>
</div>
</body>
</html>

    
 