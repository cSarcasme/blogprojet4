<?php
require('controller/frontend.php');
session_start();
try{
	$pages = scandir('view/frontend/');
	if (isset($_GET['page'])) {
		if($_GET['page'] != 'login' && !isset($_SESSION['email'])){
			header('Location:admin.php?page=login');
		}
		elseif ($_GET['page'] == 'dashboard') {
				dashboard();
		}
		elseif ($_GET['page'] == 'login') {
				login();
		}
		elseif ($_GET['page'] == 'deconnexion') {
			deconnexion();
		}
		elseif ($_GET['page'] == 'writte') {
			writte();
		}
		elseif ($_GET['page'] == 'config') {
			config();
		}
		elseif(in_array($_GET['page'],$pages)){
				$page=$_GET['page'];
		}
		else{
			throw new Exception('Ce n\' est pas la bonne page');
		}
	}
	else{
		login();
	}
}
catch(Exception $e) {
	require('view/frontend/error.php');
}
?>




