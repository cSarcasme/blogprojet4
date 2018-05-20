<?php
require('controller/frontend.php');

try{
	
	$pages = scandir('view/frontend/');
	if (isset($_GET['page'])) {
        if ($_GET['page'] == 'home') {
            listChaptersHome();
		}
		elseif ($_GET['page'] == 'blog') {
			listChaptersBlog();
		}
		elseif ($_GET['page'] == 'post') {
			postChapter();
		}
		elseif($_GET["page"]== 'click'){
			if ((isset($_GET['id']) && $_GET['id'] > 0) && (isset($_GET['idc']) && $_GET['idc'] > 0)) {
			update_CommentSeen($_GET['id'], $_GET['idc']);
			}
		}
		elseif(in_array($_GET['page'],$pages)){
			$page=$_GET['page'];
		}
		else{
			throw new Exception('Ce n\' est pas la bonne page');
			
		}
	}
	else{
		listChaptersHome();
	}
	
}
catch(Exception $e) {
	require('view/frontend/error.php');
	
}
?>







