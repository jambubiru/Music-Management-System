<?php
require "pdo.php";
require "home.php";

//To display the artist name and songs name

$sql = 'SELECT artist.name,track.title FROM album JOIN artist ON album.artist_id=artist.artist_id JOIN track ON track.album_id=album.album_id';

$statement =$pdo->prepare($sql);

$statement->execute();

$playlist = $statement->fetchAll(PDO::FETCH_OBJ);

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Home</title>
</head>
<body>
    <div class="container">
      <table class="table" border="1">
        <thead>
        <tr>
          <th>Artist Name</th>
          <th>Song</th>
        </tr>
      </thead>

        <?php foreach($playlist as $playlist):?>

        <tr>
          <td><?= $playlist->name; ?></td>
          <td><?= $playlist->title; ?></td>
        </tr>

      <?php endforeach; ?>

      </table>
    </div>
  </body>
  </html>
