<?php 
function get_title() {
	echo "bookstogo | Student Records";
}

function display_content() {
	require_once('connection.php');

	echo "
		<div class='container-fluid stud-record-div'>
			<div class='container'>
				<div class='row'>
					<form method='POST' action=''>
						<div class='col-md-6'>
							<h1>Students Record</h1>";
						if (isset($_SESSION['username'])) {
							echo '<a type="button" class="btn btn-default" href="add_stud.php">Add</a>';
						} else {
							echo "";
						}

						echo "</div>

						<div class='col-md-6'>
							<div class='input-group search_trans'>
								<span class='input-group-btn'>
									<input type='text' class='form-control' placeholder='Search here' name='search_stud'>
								</span>

								<span class='input-group-btn'>
									<select name='search_ddown' class='form-control'>
										<option disabled selected>
											Search by: </option>
										<option value='student_number'>
											Student Number</option>
										<option value='student_name'>
											Student Name</option>
										<option value='grade_level'>
											Grade Level</option>
									</select>
								</span>

								<span class='input-group-btn'>
									<input type='submit' class='form-control' name='search-stud-btn' value='Search'>
								</span>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>";

	$sql = "SELECT * FROM students_record ORDER BY student_name ASC";

	$show = mysqli_query($conn, $sql);

	//--------------code for search-stud-btn-------------
	if (isset($_POST['search-stud-btn'])) {
		$search_stud = $_POST['search_stud'];
		$search_ddown = $_POST['search_ddown'];

		$query = "SELECT * FROM students_record WHERE $search_ddown LIKE '%$search_stud%'";

		$result = mysqli_query($conn, $query);

		echo "Search result for <em>$search_stud</em>. Found " .mysqli_num_rows($result). " result.<br><hr><br>";

		if (mysqli_num_rows($result) > 0) {
			echo "
				<div class='container-fluid stud-record-div'>
					<div class='container'>
						<div class='table-responsive'>
							<table class='table table-bordered table-hover'>
								<thead>
									<tr>
										<th>Student Number</th>
										<th>Student Name</th>
										<th>Grade level</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>";
								while ($row = mysqli_fetch_assoc($result)) {
									extract($row);
								echo "<tr>
										<td>".$row['student_number']."</td>
										<td>".$row['student_name']."</td>
										<td>".$row['grade_level']."</td>";

								if (isset($_SESSION['username'])) {
									echo "<td>";
									echo '<a type="button" class="btn btn-default" href="">Update</a>

										<a type="button" class="btn btn-default" href="">Delete</a>';
									echo"</td>";

									} else {
										echo "<td>Restricted. For Admin Only</td>";
									}
								echo"</tr>";
									}
							echo"</tbody>
							</table>
						</div>
					</div>
				</div>";
		}

	}
	//------------------------------------
	else {
		if (mysqli_num_rows($show) > 0) {
			echo "
				<div class='container-fluid stud-record-div'>
					<div class='container'>
						<div class='table-responsive'>
							<table class='table table-bordered table-hover'>
								<thead>
									<tr>
										<th>Student Number</th>
										<th>Student Name</th>
										<th>Grade level</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>";
								while ($row = mysqli_fetch_assoc($show)) {
									extract($row);
								echo "<tr>
										<td>".$row['student_number']."</td>
										<td>".$row['student_name']."</td>
										<td>".$row['grade_level']."</td>";

								if (isset($_SESSION['username'])) {
									echo "<td>";
									echo '<a type="button" class="btn btn-default" href="">Update</a>

										<a type="button" class="btn btn-default" href="">Delete</a>';
									echo"</td>";

									} else {
										echo "<td>Restricted. For Admin Only</td>";
									}
							echo"</tr>";
								}
						echo"</tbody>
						</table>
					</div>
				</div>
			</div>";

		}

	}

}

require_once('template.php');

 ?>