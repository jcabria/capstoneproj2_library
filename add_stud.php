<?php 
function get_title(){
	echo "bookstogo | Add Student";
}

function display_content() {
	require_once('connection.php');

	$sql = "SELECT * FROM students_record";

	$show = mysqli_query($conn, $sql);

	if (mysqli_num_rows($show) > 0) {
		while ($row = mysqli_fetch_assoc($show)) {
			extract($row);
		}

		//----------code for add_stud_btn-------------
		if (isset($_POST['add_stud_btn'])) {
			$stud_num = mysqli_real_escape_string($conn,$_POST['stud_num']);
			$stud_name = mysqli_real_escape_string($conn,$_POST['stud_name']);
			$grade_lvl = mysqli_real_escape_string($conn,$_POST['grade_level']);

			$query = mysqli_query($conn, "SELECT * FROM students_record WHERE student_number='".$stud_num."'");

			if (mysqli_num_rows($query) > 0) {

				echo "<div class='alert alert-danger'>Student Number already exist.</div>";
			} else {

				$sql = "INSERT INTO students_record 
							(student_number,student_name,grade_level)
						VALUES ('$stud_num','$stud_name','$grade_lvl')";

				$result = mysqli_query($conn, $sql);

				echo "<div class='alert alert-success'>
						<em>'".$stud_name."'</em> has been added successfully</div>
						<meta http-equiv='refresh' content='4;url=student_record.php'/>";
			
			}
		}
		
		//-------------------------------------------

	echo "
		<div class='container-fluid'>
			<div class='container-fluid update-div'>
				<h1>Add Student</h1>

				<form method='POST' action=''>
					<div class='input-group'>
						<span class='input-group-addon'>Student Number</span>

						<input type='text' class='form-control' name='stud_num' placeholder='Please enter 8 digit Student#' required pattern='[0-9]{8}' required>
					</div>
					<br>
					<div class='input-group'>
						<span class='input-group-addon'>Student Name</span>

						<input type='text' class='form-control' name='stud_name' placeholder='Student Name (Firstname, Lastname)' required>
					</div>
					<br>
					<div class='input-group'>
						<span class='input-group-addon'>Grade Level</span>

						<select name='grade_level' class='form-control' id='gradelvl'>
							<option value='1'>1</option>
							<option value='2'>2</option>
							<option value='3'>3</option>
							<option value='4'>4</option>
							<option value='5'>5</option>
							<option value='6'>6</option>
							<option value='7'>7</option>
							<option value='8'>8</option>
							<option value='9'>9</option>
							<option value='10'>10</option>
							<option value='11'>11</option>
							<option value='12'>12</option>
						</select>
					</div>
					<br>
					<hr>
					<div class='form-group buttons'>
						<input class='btn btn-default' type='submit' name='add_stud_btn' value='Add Student'>

						<a href='student_record.php' class='btn btn-default'>Cancel</a>
					</div>
				</form>
			</div>
		</div>";

	}

}

require_once('template.php');

 ?>