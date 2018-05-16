<?php
require('controller/frontend.php');
try{
	/*
	$pages = scandir('view/frontend/');
	if (isset($_GET['page']) && !empty($_GET['page'])){
		if(in_array($_GET['page'].'.php',$pages)){
			$page=$_GET['page'];
		}
		else{
			$page = "error";
		}
	}
	else{
		$page = "dashboard";
    }
    
    $pages_functions = scandir('controller/');
    if(in_array($page.'.func.php' ,$pages_functions)){
        include('controller/'.$page.'.func.php');
	}*/


	$pages = scandir('view/frontend/');
	if (isset($_GET['page'])) {
        if ($_GET['page'] == 'dashboard') {
            dashboard();
		}
		elseif ($_GET['page'] == 'login') {
			login();
		}
		elseif(in_array($_GET['page'],$pages)){
			$page=$_GET['page'];
		}
		else{
			throw new Exception('Ce n\' est pas la bonne page');
			
		}
	}
	else{
		dashboard();
	}
}
catch(Exception $e) {
	require('view/frontend/error.php');
}
?>




