<?php
require_once "pdo.php";
require "home.php";

//To display data for artist table from database, and user can edit and delete the data by clicking on button edit and delete provided

$sql = 'SELECT * FROM artist';

$statement =$pdo->prepare($sql);

$statement->execute();

$artist = $statement->fetchAll(PDO::FETCH_OBJ);

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Artist</title>
</head>
<body>



    <div class="container">
      <table class="table" border="1">
        <thead>
        <tr>
          <th>ID</th>
          <th>Name</th>

          <th>Action</th>
        </tr>

      </thead>

        <?php  foreach($artist as $artist): ?>

        <tr>
          <td><?= $artist->artist_id; ?></td>
          <td><?= $artist->name; ?></td>
          <td>

          <a href="editArtist.php?artist_id=<?= $artist->artist_id ?>" class="ui-button ui-widget ui-corner-all">Edit</a>
          <a onclick="return confirm('Are you sure you want to delete this entry?')"  href="deleteArtist.php?artist_id=<?= $artist->artist_id ?>" class="ui-button ui-widget ui-corner-all">Delete</a>

          </td>
        </tr>

        <?php endforeach;  ?>

      </table>
    </div>
  </body>
  </html>
