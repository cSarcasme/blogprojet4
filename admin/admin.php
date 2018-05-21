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
		elseif ($_GET['page'] == 'admins.dash') {
			admins();
		}
		elseif ($_GET['page'] == 'publications.dash') {
			if(isset($_GET['p']) && $_GET['p']>0){
			publications();
			}
			else{
				throw new Exception('Ce n\' est pas la bonne page');
			}
		}
		elseif ($_GET['page'] == 'adminpost') {
			if(isset($_GET['id']) && $_GET['id']>0){
			adminPost();
			}
			else{
				throw new Exception('Ce n\' est pas la bonne page');
			}
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




