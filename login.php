<?php

include "pdo.php";

//this is for login page

	if(isset($_POST["login"]))
	{

		if(empty($_POST["username"]) || empty($_POST["password"])){
			$message = '<label>All field is required</label>';
		}
		else
		{
			$query = "SELECT * FROM user_info WHERE username = :username AND password = :password";
			$statement = $pdo->prepare($query);
			$statement->execute(

                        array(
                           
                         'username' => $_POST["username"],
                         'password' => $_POST["password"]

                        )
			);

			$count = $statement->rowCount();
			if($count > 0 )
			{
               $_SESSION["username"] = $_POST["username"];
               header("location:home.php");
			}
			else
			{
				$message = '<lable>Username OR Password is wrong</label>';
			}	
		}
	}

?>

<!DOCTYPE html>
<html lang="en">
<head>

    <title>Login Form</title>
    <link rel="stylesheet" type="text/css" href="css/css.css">

</head>
<body>
    <h2>Login Page</h2><br>

    <div class="login">
    	<?php

             if(isset($message))
             {
               echo '<label class="text-danger">'.$message.'</label>';
             }

    	?>

    <form  method="post">
        <label><b>Username:
        </b>
        </label >
        <input type="text" name="username" id="username" placeholder="Username" required>
        <br><br>
        <label ><b>Password:
        </b>
        </label>
        <input type="password" name="password" id="password" placeholder="Password" required>
        <br><br>
        <input type="submit" name="login" id="login" value="Log In Here">
        <br><br>
        <input type="checkbox" id="check">
        <span>Remember me</span>
        <br><br>
    </form>
</div>
</body>
</html>