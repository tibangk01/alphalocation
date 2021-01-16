<?php 
	session_start();
	unset( $_SESSION['pseudoUser']);
    unset($_SESSION['mdpUser']); 
    unset($_SESSION['pkUser']);      
	header('location: ../public.php');