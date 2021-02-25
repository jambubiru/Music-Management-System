<?php
require "pdo.php";
require "home.php";

//To display data for album table from database, and user can edit and delete the data by clicking on button edit and delete provided

$sql = 'SELECT * FROM album';

$statement =$pdo->prepare($sql);

$statement->execute();

$album = $statement->fetchAll(PDO::FETCH_OBJ);

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Album</title>
</head>
<body>

    <div class="container">
      <table class="table" border="1">
        <thead>
        <tr>
          <th>ID</th>
          <th>Title</th>
          <th>Artist_Id</th>

          <th>Action</th>
        </tr>
      </thead>

        <?php  foreach($album as $album): ?>

        <tr>
          <td><?= $album->album_id; ?></td>
          <td><?= $album->title; ?></td>
          <td><?= $album->artist_id; ?></td>
          <td>

          <a href="editAlbum.php?album_id=<?= $album->album_id ?>" class="ui-button ui-widget ui-corner-all">Edit</a>
          <a onclick="return confirm('Are you sure you want to delete this entry?')"  href="deleteAlbum.php?album_id=<?= $album->album_id ?>" class="ui-button ui-widget ui-corner-all">Delete</a>

          </td>
        </tr>

        <?php endforeach;  ?>

      </table>
    </div>
</body>
</html>