<?php 
function get_title() {
	echo "bookstogo | Update Book";
}

function display_content(){
	require_once('connection.php');
	$id = $_GET['id'];

	$sql = "SELECT * FROM books_record WHERE id='$id'";

	$show = mysqli_query($conn, $sql);

	if (mysqli_num_rows($show) > 0) {
		while ($row = mysqli_fetch_assoc($show)) {
			extract($row);
		}

		//-------------code for update button---------------------
		if (isset($_POST['update_bk_btn'])) {
			$book_code =$_POST['book_code'];
			$book_title =$_POST['book_title'];
			$author =$_POST['author'];
			$category =$_POST['category'];
			$stocks =$_POST['stocks'];

			$query = "UPDATE books_record 
						SET book_code='$book_code',
							book_title='$book_title',
							author='$author',
							category='$category',
							stocks='$stocks' 
						WHERE id='$id'
						";

			mysqli_query($conn, $query);

			if ($query == true) {
				echo "
					<div class='alert alert-success'> Book has been Updated successfully! Will redirect to Book Inventory Page in 4 seconds... </div>
					<meta http-equiv='refresh' content='4;url=book_inventory.php'/>
					";
			}
		}

		//------------------------------------------------------
			echo "
				<div class='container-fluid'>
					<div class='container-fluid update-div'>
						<h1>Update Book</h1>

						<form method='POST' action=''>
							<div class='input-group'>
								<span class='input-group-addon'>Book Code</span>
								<input type='text' class='form-control' name='book_code' value='$book_code' required>
							</div>
							<br>
							<div class='input-group'>
								<span class='input-group-addon'>Book Title</span>
								<input type='text' class='form-control' name='book_title' value='$book_title' required>
							</div>
							<br>

							<div class='input-group'>
								<span class='input-group-addon'>Author</span>
								<input type='text' class='form-control' name='author' value='$author' required>
							</div>
							<br>

							<div class='input-group'>
								<span class='input-group-addon'>Category</span>
								<input type='text' class='form-control' name='category' value='$category' required>
							</div>
							<br>

							<div class='input-group'>
								<span class='input-group-addon'>Stock</span>
								<input type='text' class='form-control' name='stocks' value='$stocks' required>
							</div>
							<br>
							<hr>
							<div class='form-group buttons'>
								<input class='btn btn-default' type='submit' name='update_bk_btn' value='Update Book'>

								<a href='book_inventory.php' class='btn btn-default'>Cancel</a>
							</div>
						</form>
					</div>
				</div> ";

	}

}

require_once('template.php');

?>