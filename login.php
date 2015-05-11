<?php

	$unameError="";
	$passError="";
	$loginError="";
	session_start();

	if(isset($_POST["submit"]))
	{
            if(!empty($_POST["uname"]))
            {
		if(!empty($_POST["pass"]))
		{
                    include "php/connection.php";
			if($prepare = $connection->prepare("SELECT * FROM tblusers WHERE username=:uname AND password=:pass"))
			{
                            $prepare->execute(array(
				":uname"=>$_POST['uname'],
				":pass"=>$_POST['pass']
				));

                            if($prepare->fetch(PDO::FETCH_OBJ))
                            {
				$_SESSION['login'] = true;
                                $_SESSION['name'] = $_POST['uname'];
                                
				$prepare->close();
				$connection->close();
				header("Location: http://localhost/ChatApplication/message.php");
                            }
                            else
                            {
				$loginError = "Username or Password do not exist";
                            }
			}
			else
                            echo "Error in creating a prepared";
			}
			else
			{
				$passError = "Enter your password";
			}
		}
		else
		{
			$unameError = "Enter your username";
		}
	}
?>

<html>
	<head>
		<link href="style/style.css" rel="stylesheet" type="text/css">
		<script src ="js/jquery.min.js" type="text/javascript"></script>
		<script src="js/animation.js" type="text/javascript"></script>

		<title>Log-In</title>
		
	</head>

	<body>

		<div id = "loginDiv">

			<form action="login.php" method="POST">

				<div>Username: <input type="text" name="uname" id="uname"/> </div>

				<?php echo $unameError; ?>

				<div>Password: <input type="password" id="pass" name="pass"/> </div>

				<?php echo $passError; ?>

				<input type="submit" value="Log-in" name = "submit" id="submit"/>

				<?php echo $loginError; ?>

                                <div><a id="createAccount" href="CreateAccount.php"> Create Account </a></div>

			</form>
		</div>
	</body>
</html>