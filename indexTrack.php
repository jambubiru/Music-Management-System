<?php
require "pdo.php";
require "home.php";

$sql = 'SELECT * FROM track';

//To display data for track table from database, and user can edit and delete the data by clicking on button edit and delete provided

$statement =$pdo->prepare($sql);

$statement->execute();

$track = $statement->fetchAll(PDO::FETCH_OBJ);

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <title>Track</title>
</head>
<body>



    <div class="container">
      <table class="table" border="1">
        <thead>
        <tr>
          <th>ID</th>
          <th>Title</th>
          <th>Len</th>
          <th>Rating</th>
          <th>Count</th>
          <th>Album_Id</th>
          <th>Genre_Id</th>
          <th>Action</th>
        </tr>
      </thead>

        <?php  foreach($track as $track): ?>

        <tr>
          <td><?= $track->track_id; ?></td>
          <td><?= $track->title; ?></td>
          <td><?= $track->len; ?></td>
          <td><?= $track->rating; ?></td>
          <td><?= $track->count; ?></td>
          <td><?= $track->album_id; ?></td>
          <td><?= $track->genre_id; ?></td>
          <td>

          <a href="editTrack.php?track_id=<?= $track->track_id ?>" class="ui-button ui-widget ui-corner-all">Edit</a>
          <a onclick="return confirm('Are you sure you want to delete this entry?')"  href="deleteTrack.php?track_id=<?= $track->track_id ?>" class="ui-button ui-widget ui-corner-all">Delete</a>

          </td>
        </tr>



        <?php endforeach;  ?>

      </table>
    </div>
  </body>
  </html>
