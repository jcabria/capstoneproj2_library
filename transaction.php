<?php 
	function get_title() {
		echo "bookstogo | Transaction";
	}

	function display_content () {
		require_once('connection.php');

		echo"
		<div class='container-fluid trans-div'>
			<div class='container'>
				<div class='row'>
					<form method='POST' action=''>
						<div class='col-md-6'>
							<h1>Borrow Transaction</h1>
						</div>
						<div class='col-md-6'>
							<div class='input-group search_trans'>
								<span class='input-group-btn'>
									<input type='text' class='form-control' placeholder='Search here' name='search_brw'>
								</span>

								<span class='input-group-btn'>
									<select name='search_ddown' class='form-control'>
										<option disabled selected>Search by:</option>
										<option value='student_number'>Student Number</option>
										<option value='student_name'>Student Name</option>
										<option value='book_code'>Book Code</option>
										<option value='book_title'>Book Title</option>
										<option value='author'>Author</option>
										<option value='stocks'>Stock</option>
										<option value='date_borrowed'>Date Borrowed</option>
										<option value='due_date'>Due Date</option>
									</select>
								</span>

								<span class='input-group-btn'>
									
										<input type='submit' class='form-control' name='search_brw_btn' value='Search'>
								</span>
							</div>
						</div>
					</form>
				</div> 
			</div>	
		</div>"; //end of first container

		// $sql = "SELECT * FROM borrow_trans";

		$sql = "SELECT sr.student_number,sr.student_name,br.book_code,br.book_title,br.author,br.stocks,bt.date_borrowed,bt.due_date,bt.id FROM borrowed_trans bt JOIN students_record sr ON bt.student_number_id = sr.student_number JOIN books_record br ON bt.book_record_id=br.id ORDER BY date_borrowed DESC";

		$show = mysqli_query($conn,$sql);

		//---------code for search borrow transaction------------
		if (isset($_POST['search_brw_btn'])) {
			$search_brw = $_POST['search_brw'];
			$search_ddown = $_POST['search_ddown'];

			// $query = "SELECT * from borrow_trans WHERE $search_ddown LIKE '%$search_brw%'";

			$query = "SELECT * FROM borrowed_trans bt JOIN students_record sr ON bt.student_number_id = sr.student_number JOIN books_record br ON bt.book_record_id=br.id WHERE $search_ddown LIKE '%$search_brw%'";

			$result = mysqli_query($conn, $query);

			echo "Search result for <em>$search_brw</em>. Found " .mysqli_num_rows($result). " result.<br><hr><br>";

			if (mysqli_num_rows($result) > 0) {
			

					echo "<div class='container-fluid trans-div'>
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
												<th>Stock</th>
												<th>Date Borrowed</th>
												<th>Due Date</th>
												<th>Action</th>
											</tr>
										</thead>
										<tbody>";
										while ($row = mysqli_fetch_assoc($result)) {
										extract($row);

										echo "<tr>
												<td>".$row['student_number']."</td>
												<td>".$row['student_name']."</td>
												<td>".$row['book_code']."</td>
												<td>".$row['book_title']."</td>
												<td>".$row['author']."</td>
												<td>".$row['stocks']."</td>
												<td>".$row['date_borrowed']."</td>
												<td>".$row['due_date']."</td>";
											if (isset($_SESSION['username'])) {
												
										echo"	<td>";
												echo'<a type="button" class="btn btn-default" href="return_book.php?id='.$id.'">Return Book</a>';
										echo"	</td>";
											} else {
												echo "<td>Restricted. For Admin Only</td>";
											}

									echo"	</tr>";
										}  //end of while

										echo "</tbody>
									</table>
								</div>
							</div>
						</div>
							";

			}  //end of if num rows $result

		}  //end of search brw btn
		//---------------------------------
		else {

			if (mysqli_num_rows($show) > 0) {
							
					echo"
					<div class='container-fluid trans-div'>
						<div class='container '>
							<div class='table-responsive'>
								<table class='table table-bordered table-hover'>
									<thead>
										<tr>
											<th>Student Number</th>
											<th>Student Name</th>
											<th>Book Code</th>
											<th>Book Title</th>
											<th>Author</th>
											<th>Stock</th>
											<th>Date Borrowed</th>
											<th>Due Date</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>";
									while ($row = mysqli_fetch_assoc($show)) {
									extract($row);

									echo "<tr>
											<td>".$row['student_number']."</td>
											<td>".$row['student_name']."</td>
											<td>".$row['book_code']."</td>
											<td>".$row['book_title']."</td>
											<td>".$row['author']."</td>
											<td>".$row['stocks']."</td>
											<td>".$row['date_borrowed']."</td>
											<td>".$row['due_date']."</td>";

										if (isset($_SESSION['username'])) {

									echo"	<td>";
											echo'<a type="button" class="btn btn-default" href="return_book.php?id='.$id.'">Return Book</a>';
										echo"</td>";
										} else {
											echo "<td>Restricted. For Admin Only</td>";
										} 
									echo"</tr>";
									}  //end of while

									echo "</tbody>
								</table>
							</div>
						</div>
					</div>
						";

				


			}  //end of if-show
		}  //end of else
		//   else {
		//   		echo "em" . $search_brw . "</em> not found in Borrowed Book List.";
		// }  


	}   //end of display content function

	require_once('template.php');

 ?>