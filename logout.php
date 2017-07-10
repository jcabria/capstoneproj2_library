<?php 
session_start();

//---------------
// if (session_destroy()) {
// 	header('location: login.php');
// }

//-------------
unset($_SESSION['username']);
header('location: index.php');
//-------------

 ?>