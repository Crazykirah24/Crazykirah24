<?php 

if(!empty($_SESSION['role']))
{
	// admin
	if($_SESSION['role']=="admin"){
		include "config/menu/user.php";
	}

	// membre
	if($_SESSION['role']=="client"){
		include "config/menu/customers/header.php";
	}
}

 ?>