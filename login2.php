<?php 
session_start();

	if (isset($_POST['login'])) {
		require_once('connection.php');

		$username = mysqli_real_escape_string($conn,$_POST['username']);  //mysqli_real_escape_string($conn, 
		$password = sha1($_POST['password']);

		$sql = "SELECT * FROM users WHERE username ='$username' AND password ='$password'";

		$result = mysqli_query($conn,$sql);

		if (mysqli_num_rows($result)>0) {
			while ($row = mysqli_fetch_assoc($result)) {
				extract($row);

				// $_SESSION['message'] = "Login successful! Welcome $role $username!</div>";
				$_SESSION['username'] = $username;
				$_SESSION['role'] = $role;

			
				
			if ($sql == true) {
				echo "<div class='alert alert-success'>Login Successful! Welcome $role $username! (Will redirect after 4 seconds...)</div>";
					// <meta http-equiv='refresh' content='5;url=index.php' />";  //used to have 5 seconds delay before redirecting to index.php
				?>
					<!-- used to have 4 seconds delay before redirecting to index.php --> 
					<script> var timer = setTimeout(function() {
			            window.location='index.php'
			        }, 4000); </script>
			    <?php
			}
				
			}
		} else {

			// var_dump($_SESSION);
			echo "<div class='alert alert-danger'>Incorrect admin credential entered! Please try again!</div>";
		}
	}


?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
 	<meta http-equiv="X-UA-Compatible" content="IE=edge">
 	<meta name="viewport" content="width=device-width, initial-scale-1">
 	<link href="css/bootstrap.min.css" rel="stylesheet">
 	<link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<title>bookstogo | Login</title>
	<style type="text/css">
		@font-face {
		    font-family: "mytext";
		    src: url(fonts/fonts/gidole/Gidole-Regular.otf);
		  }

		@font-face {
		    font-family: "kollektif";
		    src: url(fonts/fonts/kollektif/Kollektif.ttf);
		  }

		 @font-face {
		    font-family: "mynav2";
		    src: url(fonts/fonts/lora/Lora-Italic.ttf);
		  }

		body {
			background-color: #dab69d;  /*light brown*/
			background-image: linear-gradient(
				rgba(0,0,0,0.6),
				rgba(0,0,0,0.6)
				),
				url("image/unsplash7.jpg");
				background-attachment: fixed;
				height: auto;
				background-size: cover;
				background-position: center center;
		}

		.contents {
			min-height: 100vh;
			/*position: relative;*/
		}

		.mylogin input {
			font-family: "kollektif";
		}

		.mylogin h1 {
			font-family: "mynav2";
		}

		footer {
			font-family: "mytext";
			font-size: 13px;
			line-height: 17px;
		}

		.mylogin {
			background-color: rgba(0,0,0,0.4);
			color: white;
			min-height: 50vh;
			padding: 40px;
			position: relative;
			transform: translateY(30%);
		}

		/* ------------------------------------------*/
		
		footer {
			background: rgba(0,0,0,0.5);
			padding: 15px;
			color: orange;
			bottom: 0;
		}

		footer .developer {
			text-align: center;
		}

		.developer .links {
			font-size: 1.5em;
			padding-bottom: 10px;
		}

		footer .fa {
			color: orange;
		}

		footer .links .fa:hover {
			color: yellow;
		}

		footer span .fa {
			color: pink;
		}

	</style>

</head>
<body>
	<div class="contents">
		<div class="col-md-7"></div>
	 	<div class="container-fluid col-md-4 mylogin">
	 		<h1>LOGIN (admin)</h1>

	 		<form method="POST" action="">
	 			<div class="input-group">
	 				<span class="input-group-addon"><i class="fa fa-user" aria-hidden="true"></i></span>
	 				<input type="text" class="form-control" id="uname" name="username" placeholder="Username">
	 			</div>
	 				<br>
	 			<div class="input-group">
	 				<span class="input-group-addon"><i class="fa fa-lock" aria-hidden="true"></i></span>
	 				<input type="password" class="form-control" id="pword" name="password" placeholder="Password">
	 			</div>
	 				<br>
	 			<div class="input-group">
	 				<span class="input-group-addon">Role :</span>
	 				<input type="text" class="form-control" name="role" value="Admin" disabled>
	 			</div>
	 				<br>
	 			<div class="form-group buttons">
	 				<input class="btn btn-success btn btn-default" type="submit" name="login" value="Login">
	 				<a href="index.php" class="btn btn-danger">Cancel</a>
	 				<!-- <a href="register.php">Click here to Register new student!</a> -->
	 			</div>
	 		</form>
		</div>
	</div>
		<div class="footer">
			<?php require_once('partials/footer.php'); ?>
		</div>
	


<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed  -->
<script src="js/bootstrap.min.js"></script>

</body>
</html>