<!DOCTYPE html>
<html>

<head>
    <title>BEJELENTKEZÉS</title>
    <link rel="stylesheet" href="style2.css">

</head>

<body>

    <div id="box" class="wrapper">
        <form method="post"> 

		<div><span class="icon2"><ion-icon name="lock-closed"></ion-icon></span></div>
		<div><span class="icon"><ion-icon name="person"></ion-icon></span></div>
            <div class="input-box">
			
				<h1>Bejelentkezés</h1>
					<br>
				
                <input id="text" type="text" name="username" placeholder="Felhasználónév">

					

                <input id="text" type="password" name="password" placeholder="Jelszó">

					

                <input id="button" class="btn" type="submit" value="Bejelentkezés">
				<?php 

session_start();

	include("connection.php");
	include("functions.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$username = $_POST['username'];
		$password = $_POST['password'];

		if(!empty($username) && !empty($password) && !is_numeric($username))
		{

			//read from database
			$query = "select * from users where username = '$username' limit 1";
			$result = mysqli_query($conn, $query);

			if($result)
			{
				if($result && mysqli_num_rows($result) > 0)
				{

					$user_data = mysqli_fetch_assoc($result);
					
					if($user_data['password'] === $password)
					{

						$_SESSION['id'] = $user_data['id'];
						header("Location: weboldal/index.html");
						die;
					}
				}
			}
			
			echo "Rossz felhasználónév vagy jelszó!";
		}else
		{
			echo "Rossz felhasználónév vagy jelszó!";
		}
	}

?>
                
				
            </div>
        </form>
    </div>

	
	<a class="szoveg" >Nincs fiókod?</a> 
	<div id="box" class="wrapper2"> 

	<a class="btn btn3" href="signup.php">Kattints a regisztráláshoz</a>
	
</div>



	<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>



</body>

</html>