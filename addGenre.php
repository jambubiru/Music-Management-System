<?php

require "pdo.php";
require "home.php";

//To add new data into genre table

$message='';

if( isset($_POST['name']) ){

    $name=$_POST['name'];


    $sql ='INSERT INTO genre (name)
               VALUES (:name)';
    $statement = $pdo->prepare($sql);
    if($statement->execute([':name' => $name])){

        $message = 'Data inserted successfully, check in Genre List :)';
    }

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Add Genre</title>
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
                <input type="text" name="name" required>
            </div>
        </p>
        <p>
            <div class="space">
                <button type="submit" class="ui-button ui-widget ui-corner-all">Add Genre</button>
            </div>
        </p>
        </form>
</div>

</body>
</html>
