<?php 
function get_title(){
	echo "bookstogo | Book Inventory";
}

function display_content() {
	require_once('connection.php');

	echo "
		<div class='container-fluid bk-invnt-div'>
			<div class='container'>
				<div class='row'>
					<form method='POST' action=''>
						<div class='col-md-6'>
							<h1>Book Inventory</h1>";

						if (isset($_SESSION['username'])) {
						
							echo'<a type="button" class="btn btn-default" href="add_book.php">Add</a>';
						} else {
							echo "";
						}

					echo"</div>

						<div class='col-md-6'>
							<div class='input-group search_trans'>
								<span class='input-group-btn'>
									<input type='text' class='form-control' placeholder='Search here' name='search_bk'>
								</span>

								<span class='input-group-btn'>
									<select name='search_ddown' class='form-control'>
										<option value='no_selected'>Search by:</option>
										<option value='book_code'>Book Code</option>
										<option value='book_title'>Book Title</option>
										<option value='author'>Author</option>
										<option value='category'>Category</option>
										<option value='stocks'>Stock</option>
									</select>
								</span>

								<span class='input-group-btn'>
									<input type='submit' class='form-control' name='search-bk-btn' value='Search'>
								</span>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>";

	$sql = "SELECT * FROM books_record ORDER BY book_title ASC";

	$show = mysqli_query($conn, $sql);

	//----------------code for search-bk-btn----------------------
	if (isset($_POST['search-bk-btn'])) {
		$search_bk = $_POST['search_bk'];
		$search_ddown = $_POST['search_ddown'];

		$query = "SELECT * FROM books_record WHERE $search_ddown LIKE '%$search_bk%'";

		if ($search_ddown == "no_selected") {
			echo "Please select option provided on 'Search by:' drop-down.";
		} else {
			$result = mysqli_query($conn, $query);

			echo "Search result for <em>$search_bk</em>. Found " .mysqli_num_rows($result). " result.<br><hr><br>";

			if (mysqli_num_rows($result) > 0) {
				echo "
					<div class='container-fluid bk-invnt-div'>
						<div class='container'>
							<div>
								<p><strong>(*Disclaimer: Some book titles and authors are searched from google. Credits to the owner.)</strong></p>
							</div>
							<div class='table-responsive'>
								<table class='table table-bordered table-hover'>
									<thead>
										<tr>
											<th>Book Code</th>
											<th>Book Title</th>
											<th>Author</th>
											<th>Category</th>
											<th>Stock</th>";
										if(isset($_SESSION['username'])) {
											echo "<th>Action</th>";
										} else {
											echo "<th style='display:none;'></th>";
										}
									echo "</tr>
									</thead>
									<tbody>";
									while ($row = mysqli_fetch_assoc($result)) {
										extract($row);
									echo "<tr>
											<td>".$row['book_code']."</td>
											<td>".$row['book_title']."</td>
											<td>".$row['author']."</td>
											<td>".$row['category']."</td>
											<td>".$row['stocks']."</td>";

										if (isset($_SESSION['username'])) {
										echo "<td>";
										echo '<a type="button" class="btn btn-default" href="update_book.php?id='.$id.'">Update</a>
											
											<a type="button" class="btn btn-default" href="delete_book.php?id='.$id.'">Delete</a>';
										echo "</td>";
											
										} else {
											// echo "<td>Restricted. For Admin Only</td>";
											echo "<td style='display:none;'></td>";
										}
									echo"</tr>";
									}
								echo "</tbody>
								</table>
							</div>
						</div>
					</div>";
			}
		}

		
	}
	//------------------------------------------------------------
	else {

		if (mysqli_num_rows($show) > 0) {
			echo "
				<div class='container-fluid bk-invnt-div'>
					<div class='container'>
						<div>
							<p><strong>(*Disclaimer: Some book titles and authors are searched from google. Credits to the owner.)</strong></p>
						</div>
						<div class='table-responsive'>
							<table class='table table-bordered table-hover'>
								<thead>
									<tr>
										<th>Book Code</th>
										<th>Book Title</th>
										<th>Author</th>
										<th>Category</th>
										<th>Stock</th>";
									if(isset($_SESSION['username'])) {
										echo "<th>Action</th>";
									} else {
										echo "<th style='display:none;'></th>";
									}
								echo "</tr>
								</thead>
								<tbody>";
								while ($row = mysqli_fetch_assoc($show)) {
									extract($row);
								echo "<tr>
										<td>".$row['book_code']."</td>
										<td>".$row['book_title']."</td>
										<td>".$row['author']."</td>
										<td>".$row['category']."</td>
										<td>".$row['stocks']."</td>";

									if (isset($_SESSION['username'])) {
									echo "<td>";
									echo '<a type="button" class="btn btn-default" href="update_book.php?id='.$id.'">Update</a>
										
										<a type="button" class="btn btn-default" href="delete_book.php?id='.$id.'">Delete</a>';
									echo "</td>";
										
									} else {
										// echo "<td>Restricted. For Admin Only</td>";
										echo "<td style='display:none;'></td>";
									}
								echo"</tr>";
								}
							echo "</tbody>
							</table>
						</div>
					</div>
				</div>";
		}
	}

}  //end of display content function

require_once('template.php');

 ?>