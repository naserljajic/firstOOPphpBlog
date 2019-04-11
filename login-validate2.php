<?php
include_once('header.php');
include_once('User.php');

	if ($_SERVER['REQUEST_METHOD'] == "POST") {

		if(!empty($_POST['username']) && !empty($_POST['password'])) {
			$user=new User();
			$author=$user->loginValidate($_POST['username'],$_POST['password']);
			if (is_array($author) || is_object($author)) {
				//print_r($author);
				$_SESSION['username']=$_POST['username'];
				echo "<p>You are successfully logged in</p>";
				echo "<p><a href='index.php'>Home page </p>";

			}else {
				echo "Username or password is incorrect!";
				echo "<p> <a href='login.php'> Login again </a> <p>";
			}	
		}else {
			echo "Username or password is empty!";
			echo "<p> <a href='login.php'> Login again </a> <p>";

		}
	}

?>