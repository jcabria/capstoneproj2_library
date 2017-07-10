<?php
function get_title() {
	echo "bookstogo | Borrow Book2";
}

function display_content() {
	require_once('connection.php');
	$book_title = $_GET['title'];

	$sql = "SELECT * FROM books_record WHERE book_title='$book_title'";

	$show = mysqli_query($conn,$sql);

	if (mysqli_num_rows($show) > 0) {
		while ($row = mysqli_fetch_assoc($show)) {
			extract($row);
		}

			//-------------------------------------------
		if (isset($_POST['borrow_btn'])) {
		$stud_num = $_POST['stud_num'];
		$stud_name = $_POST['stud_name'];
		// $book_code = $_POST['book_code'];
		// $book_title = $_POST['book_title'];
		// $author = $_POST['author'];
		// $stocks = $stocks-1;
		// $date_brw = date('Y/m/d',strtotime("Now"));
		// $date_brw = $_POST['date_brw'];
		$due_date = $_POST['due_date'];

		$query = mysqli_query($conn, "SELECT * FROM students_record WHERE student_number='".$stud_num."'");

			if (mysqli_num_rows($query)>0) {
				if ($stocks > 0) {
				
					$sql = "INSERT INTO borrow_trans 
							(student_number_id,student_name_id,book_code_id,book_title_id,author_id,stock_id,date_borrowed,due_date,book_record_id)
						values ('$stud_num','$stud_name','$book_code','$book_title','$author','$stocks', NOW(),'$due_date','$id')";
						mysqli_query($conn,$sql);

						// $query2 = "UPDATE borrow_trans bt INNER JOIN books_record br ON (bt.stock_id=br.stocks) SET br.stocks = br.stocks-1, bt.stock_id=bt.stock_id-1 WHERE borrow_trans.stock_id>0 and books_record.stocks>0";

					$query2 = "UPDATE borrow_trans, books_record SET borrow_trans.stock_id=borrow_trans.stock_id-1, books_record.stocks=books_record.stocks-1 WHERE borrow_trans.book_record_id = books_record.id";
				
						mysqli_query($conn,$query2);

					if ($sql == true) {
						echo "<div class='alert alert-success'> Added in Borrowed Transaction! Will redirect to home page in 5 seconds...</div>
							<meta http-equiv='refresh' content='5;url=index.php' />
						";
						// header('location: index.php');
					}
				} else {
					echo "<div class='alert alert-danger'>No Book Available!</div>";
				}
			}  else {
				echo "<div class='alert alert-danger'>Student Number not existing</div>";
				} 
				
		}  // end of borrow btn
			//-------------------------------------------

				echo "
				<div class='container-fluid'>
					<div class='container-fluid brw-div'>
						<h1>Borrow Book</h1>

						<form method='POST' action=''>
							<div class='input-group'>
								<span class='input-group-addon'> Student Number </span>
								<input type='text' class='form-control' name='stud_num' required pattern='[0-9]{8}'>
							</div>
							<br>
							<div class='input-group'>
								<span class='input-group-addon'> Student Name</span>
								<input type='text' class='form-control' name='stud_name' required>
							</div>
							<br>
							<div class='input-group'>
								<span class='input-group-addon'> Book Code </span>
								<input type='text' class='form-control' name='book_code' value='$book_code' disabled>
							</div>
							<br>
							<div class='input-group'>
								<span class='input-group-addon'> Book Title </span>
								<input type='text' class='form-control' name='book_title' value='$book_title' disabled>
							</div>
							<br>
							<div class='input-group'>
								<span class='input-group-addon'> Author </span>
								<input type='text' class='form-control' name='author' value='$author' disabled>
							</div>
							<br>
							<div class='input-group'>
								<span class='input-group-addon'> Book/s in Shelf </span>
								<input type='text' class='form-control' name='stock' value='$stocks' disabled>
							</div>
							<br>
							<div class='input-group'>
								<span class='input-group-addon'> Date Borrowed </span>
								<input type='date' class='form-control' name='date_brw' value=''>
							</div>
							<br>
							<div class='input-group'>
								<span class='input-group-addon'> Due Date </span>
								<input type='date' class='form-control' name='due_date'>
							</div>
							<br> 
							<hr>
							<div class='form-group buttons'>
								<input class='btn btn-default' type='submit' name='borrow_btn' value='Borrow Book'>
								<a href='index.php' class='btn btn-default' target='_blank'>Cancel</a>
							</div>
						</form>
					</div>
				</div>";
	}
}
	require_once('template.php');
?>