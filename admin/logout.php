<?php
	session_start();
	require_once "../db.php";
	unset($_SESSION['logged_user']);
	redirect("../authorize.php");
?>