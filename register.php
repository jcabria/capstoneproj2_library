<?php 

require_once('connection.php');

	if (isset($_POST['register'])) {
		$stud_num = mysqli_real_escape_string($conn,$_POST['stud_num']);
		$stud_name = mysqli_real_escape_string($conn,$_POST['stud_name']);
		$grade_level = mysqli_real_escape_string($conn,$_POST['grade_level']);

		// INDICATES THAT THE STUDENT NUMBER ALREADY EXIST
		$query = mysqli_query($conn, "SELECT * FROM students_record WHERE student_number = '".$stud_num."'");

        if(mysqli_num_rows($query) > 0){

            echo "<div class='alert alert-danger'>Student Number already exists</div>";
        } 
        else { // INSERT DATA IN TABLE 'student_records'

			$sql = "INSERT INTO students_record 
				(student_number,student_name,grade_level) 
			VALUES ('$stud_num','$stud_name','$grade_level')";
			mysqli_query($conn,$sql);

			echo "<div class='alert alert-success'>Register successfully..</div>";
			?>
			<!-- REDIRECT AFTER 4sec TO 'index.php' -->
			<script> var timer = setTimeout(function() {
			            window.location='index.php'
			        }, 4000); </script>
			<?php
		}
	}   //end of if statement for $_POST['register']

 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/bootstrap.min.css" rel="stylesheet">
 	<title>REGISTER</title>

 	<style type="text/css">
 		body {
			background-color: #dab69d;  /*light brown*/
			background-image: linear-gradient(
				rgba(255,255,255,0.3),
				rgba(255,255,255,0.3)
				),
				url("image/unsplash7.jpg");
			background-attachment: fixed;
			/*min-height: 450px;*/
			background-size: cover;
			color: black;
		}

		.myreg {
			background-color: rgba(0,0,0,0.5);
			color: white;
			min-height: 50vh;
			padding: 40px;
			position: relative;
			transform: translateY(20%);
		}

 	</style>
	
	<link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
 </head>
 <body>

 	<div class="col-md-7"></div>
	<div class="container-fluid col-md-4 myreg">
 		<h1>Register student</h1>

 		<form method="POST" action="">
 			<div class="input-group">
 				<span class="input-group-addon"><i class="fa fa-id-card" aria-hidden="true"></i></span>
 				<input type="text" class="form-control" name="stud_num" placeholder="Please enter the 8 digit Student#" required pattern="[0-9]{8}">
 			</div>
		<br>
 			<div class="input-group">
 				<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
 				<input type="text" class="form-control" name="stud_name" placeholder="Student Name (Firstname, Lastname)" required>
 			</div>
 		<br>
 			<div class="input-group">
 				<span class="input-group-addon">Grade Level</span>
 				<select name="grade_level" class="form-control" id="gradelvl">
					<option value="1">1</option>
					<option value="2">2</option>
					<option value="3">3</option>
					<option value="4">4</option>
					<option value="5">5</option>
					<option value="6">6</option>
					<option value="7">7</option>
					<option value="8">8</option>
					<option value="9">9</option>
					<option value="10">10</option>
					<option value="11">11</option>
					<option value="12">12</option>
				</select>
 			</div>
 		<br>
		<br>
 			<div class="form-group">
 				<input class="btn btn-success btn-default" class="form-control" type="submit" name="register" value="Register">

 				<input class="btn btn-danger btn-default" class="form-control" type="submit" name="cancel" value="Cancel">

 			</div>

 		</form>
 	</div>
 

 <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>

 </body>
 </html>