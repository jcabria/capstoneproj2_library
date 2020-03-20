<?php 
	function get_title() {
		echo "bookstogo | Home";
	}

	function display_content () {
				?>
			<div class=" row">
				<div class="col-md-3 col-sm-2 col-xs-1"></div>
				<div class="welcome col-md-6 col-sm-8 col-xs-10">
					<h1>Welcome to BooksToGo!</h1>
					<p>"Everything you need for better future and success has already been written. And guess what? All you have to do is go to the library."</p> 

					<p><em>-Henri Frederic Amiel</em></p>
				</div>
				<div class="col-md-3 col-sm-2 col-xs-1"></div>
			</div>

			<div class="search-row">
				<div class="row">
					<form method="POST" action="">
						<div class="col-md-4 col-sm-4 col-xs-3"></div>

						<div class="search col-md-6 col-sm-6 col-xs-7">
							<div class="input-group">
								<span class="input-group-btn">
									<input type="text" class="form-control" placeholder="Search for books.." name="search-bk">
								</span>

								<span class="input-group-btn">
									<select name="search_col_bk" class="form-control">
										<!-- <option disabled selected>Search by:</option> -->
										<option value="no_selected">Search by:</option>
										<option value="book_code">Book Code</option>
										<option value="book_title">Title</option>
										<option value="author">Author</option>
										<option value="category">Category</option>
									</select> 
								</span>

								<span class="input-group-btn">
									<div class="input-group">
										<input type="submit" class="form-control" name="search-bk-btn" value="search">
									</div>
									
								</span>
							</div>
						</div>

						<div class="col-md-2 col-sm-2 col-xs-2"></div>

					</form>
				</div>
			</div>
<?php

		require_once('connection.php');

		if (isset($_POST['search-bk-btn'])) {
			$search_bk = $_POST['search-bk'];
			$search_col_bk = $_POST['search_col_bk'];
			$sql = "SELECT * FROM books_record WHERE $search_col_bk LIKE '%$search_bk%'";

			if ($search_col_bk == "no_selected") {
				echo "Please select option provided on 'Search by:' drop-down.";
			} else {
				$result = mysqli_query($conn,$sql);
				echo "Search Result for <em>$search_bk</em>. Found " .mysqli_num_rows($result). " result. <br><hr>";
				if (mysqli_num_rows($result)>0) {
					
				echo "
					<div class='container-fluid search-div'>
					<div class='container'>
						<h1>List of Books</h1>
						<div class='table-responsive'>
							<table class='table table-bordered table-hover '>
								<thead>
									<tr>
										<th>Book Code</th>
										<th>Book Title</th>
										<th>Author</th>
										<th>Category</th>
										<th>Stock Available</th>";
									if (isset($_SESSION['username'])) {
										echo "<th>
											Action</th>";
									} else {
										echo "<th style='display:none;'></th>";
									}
								echo "</tr>
								</thead>
								<tbody>";
								while ($row = mysqli_fetch_assoc($result)) {
								extract($row);

								echo "<tr>
											<td>" .$row['book_code'] . "</td>
											<td>" . $row['book_title'] . "</td>
											<td>" . $row['author'] . "</td>
											<td>" . $row['category'] . "</td>
											<td>" . $row['stocks'] . "</td>";

										if (isset($_SESSION['username'])) {

											echo"
											<td>";
											echo'<a type="button" class="btn btn-default" href="borrow_book3.php?title='.$book_title.'"> Borrow </a>';

											echo"</td>"; 

											} else {
												// echo "<td>Restricted. For Admin Only</td>";
												echo "<td style='display:none;'></td>";
											}

										echo"</tr>";
								}  //end of while
								echo "</tbody>
							</table>
						</div>
						
					</div>
					</div>";

				}  else {
					echo "<em>". $search_bk. "</em>" . " not found in library. Please try again.";
				}
			}

			
		}  

	}

	require_once('template.php');

 ?>