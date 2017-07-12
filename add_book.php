<?php 
function get_title() {
	echo "bookstogo | Add Book";
}

function display_content() {
	require_once('connection.php');

	// $id = $_GET['id'];

	// $sql = "SELECT * FROM books_record WHERE id='$id'";

	$sql = "SELECT * FROM books_record";

	$show = mysqli_query($conn, $sql);

	if (mysqli_num_rows($show) > 0) {
		while ($row = mysqli_fetch_assoc($show)) {
			extract($row);
		}

		//------------------code for Add button-----------------
		if (isset($_POST['add_bk_btn'])) {
			$book_code = $_POST['book_code'];
			$book_title = $_POST['book_title'];
			$author = $_POST['author'];
			$category = $_POST['category'];
			$stocks = $_POST['stocks'];

			$query = mysqli_query($conn, "SELECT * FROM books_record WHERE book_code = '".$book_code."'");

			if (mysqli_num_rows($query) > 0) {
				echo "<div class='alert alert-danger'> Entered Book Code already exist.</div>";
			} else {

				$sql = "INSERT INTO books_record
							(book_code,book_title,author,category,stocks)
						VALUES ('$book_code','$book_title','$author','$category','$stocks')";

				$result = mysqli_query($conn, $sql);

				echo "<div class='alert alert-success'><em>'".$book_title."'</em> book has been added successfully</div>
						<meta http-equiv='refresh' content='4;url=book_inventory.php'/>
				";
			}

		}
		//-------------------------------------------------------

		echo "
			<div class='container-fluid'>
				<div class='container-fluid update-div'>
					<h1>Add Book</h1>

					<form method='POST' action=''>
						<div class='input-group'>
							<span class='input-group-addon'>Book Code</span>
							<input type='text' class='form-control' name='book_code' required>
						</div>
						<br>
						<div class='input-group'>
							<span class='input-group-addon'>Book Title</span>
							<input type='text' class='form-control' name='book_title' required>
						</div>
						<br>

						<div class='input-group'>
							<span class='input-group-addon'>Author</span>
							<input type='text' class='form-control' name='author' required>
						</div>
						<br>

						<div class='input-group'>
							<span class='input-group-addon'>Category</span>
							<input type='text' class='form-control' name='category' required>
						</div>
						<br>

						<div class='input-group'>
							<span class='input-group-addon'>Stock</span>
							<input type='number' class='form-control' name='stocks' min='1' required>
						</div>
						<br>
						<hr>
						<div class='form-group buttons'>
							<input class='btn btn-default' type='submit' name='add_bk_btn' value='Add this Book'>

							<a href='book_inventory.php' class='btn btn-default'>Cancel</a>
						</div>
					</form>
				</div>
			</div> ";
	}
}

require_once('template.php');

 ?>