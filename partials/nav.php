<nav class="navbar navbar-default navbar-fixed-top" data-spy="affix" data-offset-top="80">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
		</div>

		<div class="brand-centered">
			<a class="navbar-brand" href="index.php">bookstogo..</a>
		</div>

		<div class="collapse navbar-collapse" id="myNavbar">
			<ul class="nav navbar-nav navbar-left"> 
				<li><a href="borrow_book.php">Borrow Book</a></li>
				<li><a href="#">Return Book</a></li>
				<li><a href="transaction.php">Transaction</a></li>
				<li><a href="#">Contact</a></li>
			</ul>	
<!-- fdafdsfffffffffffffff -->
	<?php 
		if (isset($_SESSION['username'])) { ?>
			<form class="nav navbar-nav navbar-right ryt" method="POST" action="logout.php">
				
				<li><a href="logout.php"><span class='glyphicon glyphicon-log-out'></span> Logout</button></a></li>

				<!-- <button type="submit" class="btn btn-success" name="ryt-btn">Logout</button> -->
			</form>
	<?php } else { ?>
	 
			<form class="nav navbar-nav navbar-right ryt" method="POST" action="login2.php">

				<li><a href="login2.php"><span><i class='glyphicon glyphicon-log-in'></i></span> Login</a></li>

				<!-- <button type="submit" class="btn btn-success" name="ryt-btn">Login</button> -->
			</form>
	<?php } ?>
<!-- fdafdsfffffffffffffff -->
			
		</div>
</nav>