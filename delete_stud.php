<?php 
function get_title() {
	echo "bookstogo | Delete Student";
}

function display_content() {
	require_once('connection.php');
	$id = $_GET['id'];

	$sql = "SELECT * FROM students_record WHERE id='$id'";

	$show = mysqli_query($conn, $sql);

	if (mysqli_num_rows($show) > 0) {
		while ($row = mysqli_fetch_assoc($show)) {
			extract($row);
		}
	//------------------code for delete_stud_btn-------------------
	if (isset($_POST['delete_stud_btn'])) {
		$query = "DELETE FROM students_record WHERE id='$id'";

		mysqli_query($conn, $query);

		echo "<div class='alert alert-success'><em>'".$student_name."'</em> has been deleted successfully!</div>
			<meta http-equiv='refresh' content='4;url=student_record.php'/>";
	}
	//--------------------------------------------
	echo "
		<div class='container-fluid'>
			<div class='container-fluid delete-div'>
				<h1>Delete Student</h1>

				<form method='POST' action=''>
					<div class='input-group'>
						<span class='input-group-addon'>Student Number</span>

						<input type='text' class='form-control' name='stud_num' value='$student_number' readonly>
					</div>
					<br>
					<div class='input-group'>
						<span class='input-group-addon'>Student Name</span>

						<input type='text' class='form-control' name='stud_name' value='$student_name' readonly>
					</div>
					<br>
					<div class='input-group'>
						<span class='input-group-addon'>Grade Level</span>

						<input type='number' class='form-control' name='grade_level' value='$grade_level' min=0 max=12 readonly>

					</div>
					<br>
					<hr>
					<div class='form-group buttons'>
						<span><h4>Are you sure you want to delete this student??</h4></span><br>
						<input class='btn btn-danger' type='submit' name='delete_stud_btn' value='YES!'>

						<a href='student_record.php' class='btn btn-default'>NO!</a>
					</div>
				</form>
			</div>
		</div>";

	}
}

require_once('template.php');

 ?>