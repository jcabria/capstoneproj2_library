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
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
					tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam</p>
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
							<!-- </div> -->

							<!-- <div class="input-group"> -->
								<span class="input-group-btn">
									<select name="search_col_bk" class="form-control">
										<option disabled selected>Search by:</option>
										<option value="book_code">Book Code</option>
										<option value="book_title">Title</option>
										<option value="author">Author</option>
										<option value="category">Category</option>
									</select> 
								</span>
							<!-- </div> -->

							<!-- <div class="input-group"> -->
								<span class="input-group-btn">
									<div class="input-group">
										<input type="submit" class="form-control" name="search-bk-btn" value="search">

										<!-- <button class="btn btn-default" type="button" name="search-bk-btn"><i class="fa fa-search" aria-hidden="true"></i>Go!</button> -->
									</div>
									
								</span>
							</div>

						</div>

						<div class="col-md-2 col-sm-2 col-xs-2"></div>

					</form>
				</div>

						

						<!-- <div class="search col-md-4 col-sm-4">
							<div class="input-group">
								<input type="text" class="form-control" placeholder="Search for students.." name="search-stud">
								<span class="input-group-btn">
									<button class="btn btn-default" type="button" name="search-stud-btn"><i class="fa fa-search" aria-hidden="true"></i>Go!</button>
								</span>
							</div>
						</div>

						<div class="col-md-1 col-sm-1"></div> -->

					
				<!-- </div>	 end of row -->
			</div>
<?php

		require_once('connection.php');

		if (isset($_POST['search-bk-btn'])) {
			$search_bk = $_POST['search-bk'];
			$search_col_bk = $_POST['search_col_bk'];
			$sql = "SELECT * FROM books_record WHERE $search_col_bk LIKE '%$search_bk%'";

			$result = mysqli_query($conn,$sql);
			echo "Search Result for <em>$search_bk</em>. Found " .mysqli_num_rows($result). " result. <br><hr>";
			if (mysqli_num_rows($result)>0) {
				

				// echo "$book_code <br> $book_title <br> $author <br> $category <br> $stocks" ;
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
									<th>Stock Available</th>
									<th>Action</th>
								</tr>
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

										echo"</td>

										"; //<td><a type='button' class='btn btn-default' href='borrow_book.php?id=$id'> Borrow </a> 
										// <a type='button' class='btn btn-default' href='return_book.php?id=$id'> Return </a></td>";

										} else {
											echo "<td>Restricted. For Admin Only</td>";
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

	require_once('template.php');

 ?>