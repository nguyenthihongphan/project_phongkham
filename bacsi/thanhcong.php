<?php 
include("../Admin/assets/db_config.php");

  	$gotoPage = $_GET['goto_page'];

    $message = $_GET['message'];
     	
  	header("Location:$gotoPage?message=$message");

?>