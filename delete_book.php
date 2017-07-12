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

			$query = "DELETE FROM books_record WHERE id = '$id'";

			$result = mysqli_query($conn, $query);

			echo "<div class='alert alert-success'><em>'".$book_title."'</em> book has been deleted successfully.</div>
					<meta http-equiv='refresh' content='4;url=book_inventory.php'/>
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
							<input type='text' class='form-control' name='book_code' value='$book_code' disabled>
						</div>
						<br>
						<div class='input-group'>
							<span class='input-group-addon'>Book Title</span>
							<input type='text' class='form-control' name='book_title' value='$book_title' disabled>
						</div>
						<br>

						<div class='input-group'>
							<span class='input-group-addon'>Author</span>
							<input type='text' class='form-control' name='author' value='$author' disabled>
						</div>
						<br>

						<div class='input-group'>
							<span class='input-group-addon'>Category</span>
							<input type='text' class='form-control' name='category' value='$category' disabled>
						</div>
						<br>

						<div class='input-group'>
							<span class='input-group-addon'>Stock</span>
							<input type='text' class='form-control' name='stocks' value='$stocks' disabled>
						</div>
						<br>
						<hr>
						<div class='form-group buttons'>
							<span><h4>Are you sure you want to delete this book??</h4></span><br>
							<input class='btn btn-danger' type='submit' name='delete_bk_btn' value='Yes'>

							<a href='book_inventory.php' class='btn btn-default'>No</a>
						</div>
					</form>
				</div>
			</div>";

	}
}

require_once('template.php');

?>