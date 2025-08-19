<?php
require 'controllers/UserController.php';
require 'controllers/CustomersContoller.php';
require 'controllers/ProductsController.php';
require 'controllers/CartsController.php';	

if (isset($_GET['c']) and isset($_GET['a'])) {
	$controller = $_GET['c'];
	$action = $_GET['a'];
	if (class_exists($controller) and method_exists($controller, $action)) {
		$class = new $controller();
		$class->$action();
	}else{
		echo "404";
	}
}else{
	echo "404";
}

?>