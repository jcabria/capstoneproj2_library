<?php 
function get_title() {
	echo "bookstogo | Returned Book Inventory";
}

function display_content() {
	require_once('connection.php');

	echo "
		<div class='container-fluid rtn-invnt-div'>
			<div class='container'>
				<div class='row'>
					<form method='POST' action=''>
						<div class='col-md-6'>
							<h1>Returned Book Inventory</h1>
						</div>
							
						<div class='col-md-6'>
							<div class='input-group search_trans'>
								<span class='input-group-btn'>
									<input type='text' class='form-control' placeholder='Search here' name='search_rtn'>
								</span>

								<span class='input-group-btn'>
									<select name='search_ddown' class='form-control'>
										<option disabled selected>Search by:</option>
										<option value='student_number'>Student Number</option>
										<option value='student_name'>Student Name</option>
										<option value='book_code'>Book Code</option>
										<option value='book_title'>Book Title</option>
										<option value='author'>Author</option>
										<option value='category'>Category</option>
										<option value='date_borrowed'>Date Borrowed</option>
										<option value='date_returned'>Date Returned</option>
									</select>
								</span>

								<span class='input-group-btn'>
									<input type='submit' class='form-control' name='search-rtn-btn' value='Search'>
								</span>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>";

	// $sql = "SELECT * FROM returned_trans rt JOIN borrow_trans bt
	// 		WHERE bt.student_number_id = rt.student_number_id
	// 		AND bt.book_record_id = rt.book_record_id";

	// $sql = "SELECT * FROM returned_trans";

	$sql = "SELECT * FROM returned_trans rt JOIN students_record sr ON rt.student_number_id=sr.student_number JOIN books_record br ON rt.book_record_id=br.id";

	$show = mysqli_query($conn, $sql);

	//--------------------code for search return inventory---------------------
	if (isset($_POST['search-rtn-btn'])) {
		$search_rtn = $_POST['search_rtn'];
		$search_ddown = $_POST['search_ddown'];

		$query = "SELECT * FROM returned_trans rt JOIN students_record sr ON (rt.student_number_id=sr.student_number) JOIN books_record br ON (rt.book_record_id=br.id) WHERE $search_ddown LIKE '%$search_rtn%'";

		$result = mysqli_query($conn, $query);

		echo "Search result for <em>$search_rtn</em>. Found " .mysqli_num_rows($result). " result.<br><hr><br>";

		if (mysqli_num_rows($result) > 0) {

				echo "
					<div class='container-fluid rtn-invnt-div'>
						<div class='container'>
							<div class='table-responsive'>
								<table class='table table-bordered table-hover'>
									<thead>
										<tr>
											<th>Student Number</th>
											<th>Student Name</th>
											<th>Book Code</th>
											<th>Book Title</th>
											<th>Author</th>
											<th>Category</th>
											<th>Date Borrowed</th>
											<th>Date Returned</th>
										</tr>
									</thead>
									<tbody>";
									while ($row = mysqli_fetch_assoc($result)) {
										extract($row);
									echo"<tr>
											<td>".$row['student_number']."</td>
											<td>".$row['student_name']."</td>
											<td>".$row['book_code']."</td>
											<td>".$row['book_title']."</td>
											<td>".$row['author']."</td>
											<td>".$row['category']."</td>
											<td>".$row['date_borrowed']."</td>
											<td>".$row['date_returned']."</td>
										</tr>";
									}  //end of while
								echo"</tbody>
								</table>
							</div>
						</div>
					</div>";
		}
	}

	//-------------------------------------------------------------------------
	else {
		if (mysqli_num_rows($show) > 0) {

			echo "
				<div class='container-fluid rtn-invnt-div'>
					<div class='container'>
						<div class='table-responsive'>
							<table class='table table-bordered table-hover'>
								<thead>
									<tr>
										<th>Student Number</th>
										<th>Student Name</th>
										<th>Book Code</th>
										<th>Book Title</th>
										<th>Author</th>
										<th>Category</th>
										<th>Date Borrowed</th>
										<th>Date Returned</th>
									</tr>
								</thead>
								<tbody>";
								while ($row = mysqli_fetch_assoc($show)) {
									extract($row);
								echo"<tr>
										<td>".$row['student_number']."</td>
										<td>".$row['student_name']."</td>
										<td>".$row['book_code']."</td>
										<td>".$row['book_title']."</td>
										<td>".$row['author']."</td>
										<td>".$row['category']."</td>
										<td>".$row['date_borrowed']."</td>
										<td>".$row['date_returned']."</td>
									</tr>";
								}  //end of while
							echo"</tbody>
							</table>
						</div>
					</div>
				</div>";
			
		}
	}

}  //end of display content function

	require_once('template.php');

?>