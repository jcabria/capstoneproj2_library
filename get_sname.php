<?php 

require_once('connection.php');

$stud_num = $_POST['stud_num'];

$sql = "SELECT student_name FROM students_record WHERE student_number = '$stud_num'";

$result = mysqli_query($conn, $sql);

	while ($row = mysqli_fetch_assoc($result)) {
	extract($row);
	echo $student_name;
	}


 ?>