<?php 
	function get_title(){
		echo "bookstogo | Return Book";
	}

	function display_content() {
		require_once('connection.php');

		$id = $_GET['id'];

		$sql = "SELECT * FROM borrow_trans WHERE id='$id'";

		$result = mysqli_query($conn,$sql);

		if (mysqli_num_rows($result)>0) {
			while ($row=mysqli_fetch_assoc($result)) {
				extract($row);
			}

			//---------------for return book button-------------------
			if (isset($_POST['return_btn'])) {

				$sql2 = "UPDATE borrow_trans, books_record 
					SET borrow_trans.stock_id=borrow_trans.stock_id+1, books_record.stocks=books_record.stocks+1 
					WHERE borrow_trans.book_record_id=books_record.id";

				mysqli_query($conn, $sql2);	



				$save = "INSERT INTO returned_trans (student_number_id,book_record_id,date_borrowed,date_returned)
					VALUES ('$student_number_id','$book_record_id','$date_borrowed', NOW())";
				mysqli_query($conn, $save);



				$sql = "DELETE FROM borrow_trans WHERE id = '$id'";
				
				mysqli_query($conn, $sql);

				// if (mysqli_num_rows($result) > 0) {
				// 	while ($row = mysqli_fetch_assoc($result)) {
				// 		extract($row);
				// 	}
				// }


				

				

				if ($sql && $sql2 && $save == true) {
					echo "<div class='alert alert-success'> Deleted from Borrowed List. Will redirect to Transaction Page in 4 seconds... </div>
						<meta http-equiv='refresh' content='4;url=transaction.php'/>
						";
				}  else {
					echo "<div class='alert alert-danger'> Some error occured in your queries :( </div>";
				}
			}  //end of if isset

			echo "
			<div class='container-fluid'>
				<div class='container-fluid rtn-div'>
					<h1>Return Book</h1>

					<form method='POST' action=''>
						<div class='input-group'>
							<span class='input-group-addon'>
								Student Number
							</span>

							<input type='text' class='form-control' name='stud_num' value='$student_number_id' disabled>
						</div>
						<br>

						<div class='input-group'>
							<span class='input-group-addon'>
								Student Name
							</span>

							<input type='text' class='form-control' name='stud_name' value='$student_name_id' disabled>
						</div>
						<br>

						<div class='input-group'>
							<span class='input-group-addon'>
								Book Code
							</span>

							<input type='text' class='form-control' name='book_code' value='$book_code_id' disabled>
						</div>
						<br>

						<div class='input-group'>
							<span class='input-group-addon'>
								Book Title
							</span>

							<input type='text' class='form-control' name='book_title' value='$book_title_id' disabled>
						</div>
						<br>

						<div class='input-group'>
							<span class='input-group-addon'>
								Author
							</span>

							<input type='text' class='form-control' name='author' value='$author_id' disabled>
						</div>
						<br>

						<div class='input-group'>
							<span class='input-group-addon'>
								Stock
							</span>

							<input type='text' class='form-control' name='stock' value='$stock_id' disabled>
						</div>
						<br>

						<div class='input-group'>
							<span class='input-group-addon'>
								Date Borrowed
							</span>

							<input type='text' class='form-control' name='date_borrowed' value='$date_borrowed' disabled>
						</div>
						<br>

						<div class='input-group'>
							<span class='input-group-addon'>
								Due Date
							</span>

							<input type='text' class='form-control' name='due_date' value='$due_date' disabled>
						</div>
						<br>
						<hr>
						<div class='form-group'>
							<input type='submit' class='btn btn-default' name='return_btn' value='Return Book'>
							<input type='submit' class='btn btn-default' name='cancel' value='Cancel'>
						</div>

					</form>
				</div>
			</div>";


		}  //end of if num rows

// $sql = "SELECT * FROM books_record br JOIN borrow_trans bt ON br.stocks = bt.stock_id WHERE $search_col_bk LIKE '%$search_bk%'";








		echo "this is return book page";
	}  //end of display_content function

	require_once('template.php');
 ?>