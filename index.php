<!DOCTYPE html>
<html>
	<head>
		<title>Login</title>
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
	</head>
	<body>
		<h1>Login</h1>
		<?php
        session_start();

        if(isset($_SESSION['username']) && isset($_SESSION['id'])){
            header("Location: dashboard.php");
            exit();
        } 
		if (isset($_GET["msg"]) && $_GET["msg"] == "incorrect"){
			echo "<p> Incorrect Username or Password </p>";
		}
		?>

		
		<form action="authenticate.php" method="post">
			<label for="username">
				<i class="fas fa-user"></i>
			</label>
			<input type="text" name="username" placeholder="Username" id="username" required>
			<label for="password">
				<i class="fas fa-lock"></i>
			</label>
			<input type="password" name="password" placeholder="Password" id="password" required>
			<input type="submit" value="Login">
		</form>
	</body>
</html>