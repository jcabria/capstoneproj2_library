<?php 
function get_title() {
	echo "bookstogo | Update Student";
}

function display_content() {
	require_once('connection.php');
	$id = $_GET['id'];

	$sql = "SELECT * from students_record WHERE id='$id'";

	$show = mysqli_query($conn, $sql);

	if (mysqli_num_rows($show) > 0) {
		while ($row = mysqli_fetch_assoc($show)) {
			extract($row);
		}

		//--------------code for update_stud_btn-----------
		if (isset($_POST['update_stud_btn'])) {
			$stud_num = $_POST['stud_num'];
			$stud_name = $_POST['stud_name'];
			$grade_level = $_POST['grade_level'];

				$sql = "UPDATE students_record
							SET student_number='$stud_num',
								student_name='$stud_name',
								grade_level='$grade_level'
							WHERE id='$id'";

				mysqli_query($conn, $sql);

				echo "<div class='alert alert-success'>
						Student <em>'".$stud_name."'</em> has been updated successfully!
					</div>
					<meta http-equiv='refresh' content='4;url=student_record.php'/>";
		}
		//---------------------------------------------

		echo "
			<div class='container-fluid'>
				<div class='container-fluid update-div'>
					<h1>Update Student</h1>

					<form method='POST' action=''>
						<div class='input-group'>
							<span class='input-group-addon'>Student Number</span>

							<input type='text' class='form-control' name='stud_num' value='$student_number' readonly>
						</div>
						<br>
						<div class='input-group'>
							<span class='input-group-addon'>Student Name</span>

							<input type='text' class='form-control' name='stud_name' value='$student_name' required>
						</div>
						<br>
						<div class='input-group'>
							<span class='input-group-addon'>Grade Level</span>

							<input type='number' class='form-control' name='grade_level' value='$grade_level' min=1 max=12>

						</div>
						<br>
						<hr>
						<div class='form-group buttons'>
							<input class='btn btn-default' type='submit' name='update_stud_btn' value='Update Student'>

							<a href='student_record.php' class='btn btn-default'>Cancel</a>
						</div>
					</form>
				</div>
			</div>";
	}
}

require_once('template.php');

 ?>