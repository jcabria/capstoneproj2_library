<?php 
function get_title() {
	echo "bookstogo | Borrow Book3";
}

function display_content() {
	require_once('connection.php');
	$book_title = $_GET['title'];

	$sql = "SELECT * FROM books_record WHERE book_title='$book_title'";

	$show = mysqli_query($conn, $sql);

	if (mysqli_num_rows($show) > 0) {
		while ($row = mysqli_fetch_assoc($show)) {
			extract($row);
		}

		//---------------code for borrow btn-------------------
		if (isset($_POST['borrow_btn'])) {
			$stud_num = $_POST['stud_num'];
			$date_brw = $_POST['date_brw'];
			$due_date = $_POST['due_date'];

		$query = mysqli_query($conn, "SELECT * FROM students_record WHERE student_number='".$stud_num."'");

		  if (mysqli_num_rows($query)>0) {

			if ($stocks > 0) {

				$sql2 = "UPDATE books_record
							SET books_record.stocks=books_record.stocks-1
							WHERE book_title='$book_title'";

				mysqli_query($conn, $sql2);

				$save = "INSERT INTO borrowed_trans 
								(student_number_id,book_record_id,date_borrowed,due_date)
							VALUES ('$stud_num','$id','$date_brw','$due_date')";
				mysqli_query($conn, $save);


				if ($sql2 && $save == true) {
					echo "<div class='alert alert-success'> 
							Added in Borrowed Transaction! Will redirect to home page in 4 seconds...
						</div>
						<meta http-equiv='refresh' content='4;url=index.php'/>
					";
				}
			} else {
				echo "<div class='alert alert-danger'> No Book Available!</div>";
			}
		  } else {
			echo "<div class='alert alert-danger'>Student Number does not exist</div>";
		  }
		}  //end of borrow btn
		//--------------------------------------------

		echo "
			<div class='container-fluid'>
				<div class='container-fluid brw-div'>
					<h1>Borrow Book</h1>

					<form method='POST' action=''>
						<div class='input-group'>
							<span class='input-group-addon'>Student Number </span>
							<input type='text' id='stud_num' class='form-control' name='stud_num' required pattern='[0-9]{8}'>
						</div>
						<br>
						<div class='input-group'>
							<span class='input-group-addon'>Student Name</span>
							<input type='text' id='stud_name' class='form-control' name='stud_name' readonly>
						</div>
						<br>
						<div class='input-group'>
							<span class='input-group-addon'>Book Code</span>
							<input type='text' class='form-control' name='book_code' value='$book_code' readonly>
						</div>
						<br>
						<div class='input-group'>
								<span class='input-group-addon'> Book Title </span>
								<input type='text' class='form-control' name='book_title' value='$book_title' readonly>
							</div>
							<br>
							<div class='input-group'>
								<span class='input-group-addon'> Author </span>
								<input type='text' class='form-control' name='author' value='$author' readonly>
							</div>
							<br>
							<div class='input-group'>
								<span class='input-group-addon'> Book/s in Shelf </span>
								<input type='text' class='form-control' name='stock' value='$stocks' readonly>
							</div>
							<br>
							<div class='input-group'>
								<span class='input-group-addon'> Date Borrowed </span>
								<input type='date' class='form-control' name='date_brw' id='myDate' readonly>
							</div>
							<br>
							<div class='input-group'>
								<span class='input-group-addon'> Due Date </span>
								<input type='date' class='form-control' name='due_date' id='tomDate' readonly>
							</div>
							<br> 
							<hr>
							<div class='form-group buttons'>
								<input class='btn btn-default' type='submit' name='borrow_btn' value='Borrow Book'>
								<a href='index.php' class='btn btn-default'>Cancel</a>
							</div>
						</form>
					</div>
				</div>";
	}
}

require_once('template.php');

?>

<script type="text/javascript">
$('#stud_num').blur(function(){
	 var stud_num = $('#stud_num').val();
//	 alert(stud_num);

	 $.post("get_sname.php",
    {
        stud_num: stud_num,
    },
    function(data, status){
        $('#stud_name').val(data);
    });	
});


	var today = new Date();
    	$('#myDate').val(today.getFullYear() + '-' + ('0' + (today.getMonth() + 1)).slice(-2) + '-' + ('0' + today.getDate()).slice(-2));

    var tomorrow = new Date();
    	$('#tomDate').val(tomorrow.getFullYear() + '-' + ('0' + (tomorrow.getMonth() + 1)).slice(-2) + '-' + ('0' + tomorrow.getDate() + 3).slice(-2));

</script>