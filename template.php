<?php 
	session_start();
 ?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

	<title><?php get_title(); ?></title>

	<style type="text/css">
		@font-face {
		    font-family: "mynav";
		    src: url(fonts/fonts/lora/Lora-BoldItalic.ttf);
		  }

		@font-face {
		    font-family: "mynav2";
		    src: url(fonts/fonts/lora/Lora-Italic.ttf);
		  }

		@font-face {
		    font-family: "webname";
		    src: url(fonts/fonts/sacramento/Sacramento-Regular.ttf);
		  }

		@font-face {
		    font-family: "yellowtail";
		    src: url(fonts/fonts/yellowtail/yellowtail-regular.ttf);
		    font-weight: bold;
		  }

		@font-face {
		    font-family: "mytext";
		    src: url(fonts/fonts/gidole/Gidole-Regular.otf);
		  }

		@font-face {
		    font-family: "kollektif";
		    src: url(fonts/fonts/kollektif/Kollektif.ttf);
		  }

		body {
			background-color: #dab69d;  /*light brown*/
			background-image: linear-gradient(
				rgba(0,0,0,0.5),
				rgba(0,0,0,0.5)
				),
				url("image/unsplash7.jpg");
				background-attachment: fixed;
				height: auto;
				background-size: cover;
				background-position: center center;
		}

		/*------------------FONT FAMILY-------------------*/
		.navbar {
			font-family: "mytext";
			font-size: 1.1em;
		}

		.navbar-brand {
			font-family: "webname";
			font-size: 1.9em;
		}

		.contents-here h1 {
			font-family: "mynav2";
		}

		.contents-here p,
		.search-row,
		.contents-here input,
		.contents-here select,
		.contents-here span,
		.search-div th,
		.search-div td,
		.trans-div th,
		.trans-div td {
			font-family: "kollektif";
		}

		footer {
			font-family: "mytext";
			font-size: 13px;
			line-height: 17px;
		}

		/* --------------------navbar----------------------*/
		.navbar {
			margin-bottom: 0;
			background-color: transparent;
			border-color: rgba(0,0,0,0.5) transparent transparent transparent;
		}

		.navbar-default .navbar-collapse  {
			background-color: rgba(0,0,0,0.7);
		}

		.navbar-default .navbar-nav > li > a,
		.brand-centered .navbar-brand/*,
		.navbar-default .navbar-nav > li > a:focus,
		.brand-centered .navbar-brand:focus*/ {
			color: orange;
		}

		.navbar-default .navbar-toggle .icon-bar {
			background-color: orange;
		}

		.navbar-default .navbar-toggle,
		.navbar-default .navbar-toggle:focus {
			border: 1px solid transparent;
			background-color: transparent;
		}

		#myNavbar a:hover {
			color: white;
			border-bottom: 1px solid white;
		}

		.brand-centered .navbar-brand:hover,
		.navbar-default .navbar-nav > li > a:focus,
		.brand-centered .navbar-brand:focus {
			color: white;
		}

		.navbar-default .navbar-toggle:hover {
			background-color: white;
		}

		#myNavbar .ryt a {
			padding-right: 30px;
		}

		.affix {
			width: 100%;
			background-color: rgba(0,0,0,0.8);
			transition: 0.7s;
			padding-left: 10px;
			padding-right: 10px;
		}

		/*center navbar-brand*/
		.brand-centered {
			position: relative;
		}

		.navbar-brand {
			position: absolute;
			left: 50%;
			margin-left: -10px;
			display: block;
			padding-left: 20px;
		}

		@media (max-width: 768px) {
			.brand-centered {
				display: flex;
				justify-content: center;
				position: absolute;
				width: 100%;
				left: 0;
				top: 0;
			}
		}

		/* --------------------contents----------------------*/
		.contents-here {
			min-height: 100vh;
			color: orange;
		}

		.contents-here .welcome {
			/*width: 50%;*/
			/*position: relative;
			left: 50%;
			top: 40%;*/
			/*transform: translate(-50%,-50%);*/
			border: 4px solid white;
			padding: 30px 16px;
			text-align: center;
			color: white;
			margin-top: 50px;
			margin-bottom: 40px;
			justify-content: center;
		}

		.search-row .row .search {
			margin-top: 20px;
			margin-bottom: 40px;
		}

		/*----------------------footer----------------------*/
		footer {
			background: rgba(0,0,0,0.5);
			padding: 15px;
			color: orange;
			bottom: 0;
		}

		footer .developer {
			text-align: center;
		}

		.developer .links {
			font-size: 1.5em;
			padding-bottom: 10px;
		}

		footer .fa {
			color: orange;
		}

		footer .links .fa:hover {
			color: yellow;
		}

		footer span .fa {
			color: pink;
		}

		/* -----------------index content-------------------*/
		.search-div,
		.trans-div,
		.rtn-invnt-div,
		.bk-invnt-div,
		.stud-record-div {
			background-color: rgba(255,255,255,0.8);
			border: 1px solid orange;
			padding: 15px;
			margin: 10px;
			color: black;
		}

		.table-bordered,
		.table-bordered > thead > tr > th,
		.table-bordered > tbody > tr > td {
			border: 1px solid orange;
		}
		/* ------------------borrow content-----------------*/
		.brw-div,
		.rtn-div,
		.update-div,
		.delete-div {
			background-color: rgba(0,0,0,0.5);
			border: 1px solid orange;
			padding: 50px;
			margin: 10px;
			max-width: 90%;
			justify-content: center;
		}
		/* --------------------*******----------------------*/
		.ryt button {
			margin-right: 30px;
		}
		/* --------------------*******----------------------*/
		.search_trans {
			padding: 20px;
		}
	</style>

</head>
<body>

	<div class="container">
		<nav class="navbar">
			<?php require_once('partials/nav.php'); ?>
		</nav>
	</div>   <!-- end of container navbar -->

	<div class="container-fluid">
		<div class="contents-here">
			<?php display_content(); ?>
		</div>  <!-- end of contents-here -->
	</div>   <!-- end of container contents-here -->

	<div class="footer">
		<?php require_once('partials/footer.php'); ?>
	</div>    <!-- end of div footer -->


<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>

</body>
</html>