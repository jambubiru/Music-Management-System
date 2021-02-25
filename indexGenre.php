<?php
require_once "pdo.php";
require "home.php";

//To display data for genre table from database, and user can edit and delete the data by clicking on button edit and delete provided

$sql = 'SELECT * FROM genre';

$statement =$pdo->prepare($sql);

$statement->execute();

$genre = $statement->fetchAll(PDO::FETCH_OBJ);

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Genre</title>
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

        <?php  foreach($genre as $genre): ?>

        <tr>
          <td><?= $genre->genre_id; ?></td>
          <td><?= $genre->name; ?></td>
          <td>

          <a href="editGenre.php?genre_id=<?= $genre->genre_id ?> " class="ui-button ui-widget ui-corner-all">Edit</a>
          <a onclick="return confirm('Are you sure you want to delete this entry?')"  href="deleteGenre.php?genre_id=<?= $genre->genre_id ?>" class="ui-button ui-widget ui-corner-all">Delete</a>

          </td>
        </tr>

        <?php endforeach;  ?>

      </table>
    </div>
  </body>
  </html>
