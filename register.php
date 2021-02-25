<?php
require "pdo.php";

//this for new user to register into the system

if(isset($_POST['username']) && isset($_POST['password'])){
$sql = "INSERT INTO user_info(username, password) values (:username, :password)";
echo("<pre>\n".$sql."\n</pre>\n");
$stmt = $pdo->prepare($sql);
$stmt -> execute(array(
        ':username' => $_POST['username'],
        ':password' => $_POST['password']));
 

			$count = $stmt->rowCount();
			if($count > 0 )
			{
               $_SESSION["username"] = $_POST["username"];
               header("location:login.php");
			}
			else
			{
				$message = '<lable>Please register first/again</label>';
			}
}

	

?>

<!DOCTYPE html>
<html lang="en">
<head>
	    <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Register Form</title>
    <link rel="stylesheet" type="text/css" href="css/css.css">
    <script defer src="validation.js"></script>
</head>
<body>
    <h2>Register</h2><br>
    <div class="login">
    <div id="error"></div>
    <form id="form"  method="post">
        <label ><b>Username:
        </b>
        </label for="username">
        <input id="username" name="username" type="text" placeholder="Enter username" required>
        <br><br>
        <label for="password"><b>Password:
        </b>
        </label >
        <input id="password" name="password" type="password" placeholder="Enter password" required>
        <br><br>
        <button type="submit" >Register</button>
        <br><br>

    </form>
</div>
</body>
</html>
