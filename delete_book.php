<?php 
function get_title() {
	echo "bookstogo | Delete Book";
}

function display_content() {
	require_once('connection.php');
	$id = $_GET['id'];

	$sql = "SELECT * FROM books_record WHERE id='$id'";

	$show = mysqli_query($conn, $sql);

	if (mysqli_num_rows($show) > 0) {
		while ($row = mysqli_fetch_assoc($show)) {
			extract($row);
		}

		//---------------code for delete button--------------------
		if (isset($_POST['delete_bk_btn'])) {
			$book_code =$_POST['book_code'];
			$book_title =$_POST['book_title'];
			$author =$_POST['author'];
			$category =$_POST['category'];
			$stocks =$_POST['stocks'];

			$query = "DELETE FROM books_record
						SET book_code='$book_code',
							book_title='$book'
						";
		}


		//--------------------------------------------------------
		echo "
			<div class='container-fluid'>
				<div class='container-fluid delete-div'>
					<h1>Delete Book</h1>

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
							<input class='btn btn-default' type='submit' name='delete_bk_btn' value='Delete Book'>

							<a href='book_inventory.php' class='btn btn-default'>Cancel</a>
						</div>
					</form>
				</div>
			</div>";

	}

}

require_once('template.php');

?>