




<!DOCTYPE html>
<html>
<head>
	<title>REGISZTRÁLÁS</title>
	<link rel="stylesheet" href="style2.css">
</head>

<body>
 <div id="box" class="wrapper">
  <form method="post">

  <div><span class="icon2"><ion-icon name="lock-closed"></ion-icon></span></div>
		<div><span class="icon"><ion-icon name="person"></ion-icon></span></div>
		<div><span class="icon3"><ion-icon name="mail"></ion-icon></span></div>

	<div class="input-box">
			<h1>Regisztrálás</h1>
			<br>
			<input id="text" type="text" name="username" placeholder="Felhasználónév">
			<input id="text" type="password" name="password" placeholder="Jelszó">
			<input id="text" type="email" name="email" placeholder="Email">
			<input id="button" class="btn" type="submit" value="Regisztrálás">

			<break>



			<?php 
session_start();

	include("connection.php");
	include("functions.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$username = $_POST['username'];
		$password = $_POST['password'];
		$email = $_POST['email'];

		if(!empty($username) && !empty($password) && !is_numeric($username) &&!empty($email))
		{

			//save to database
			$result = mysqli_query($conn, "SELECT MAX(id) AS LargestId FROM users");
			$id_array = mysqli_fetch_assoc($result);
			$id = $id_array['LargestId'] + 1;
			$query = "INSERT INTO users (id, username, password, email) VALUES ('$id', '$username', '$password', '$email')";

			mysqli_query($conn, $query);

			header("Location: weboldal/index.html");
			die;
		}else
		{
			/*ezt nem jo heyre irja ki */
			echo "Kérem töltse ki az összes ablakot!";
		}
	}
?>



	</div>
  </form>
  </div>

  <a class="szoveg" >Van már fiókod?</a> 
	<div id="box" class="wrapper2"> 

	<a class="btn btn3" href="login.php">Kattints a bejelentkezéshez</a>
	
</div>


<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>


</body>
</html>





