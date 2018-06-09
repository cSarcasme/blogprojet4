<?php
require('controller/frontend.php');

try{
	
	$pages = scandir('view/frontend/');
	
	if (isset($_GET['page'])) {
		/* page home */
        if ($_GET['page'] == 'home') {
            listChaptersHome();
		}
		/* page blog */
		elseif ($_GET['page'] == 'blog') {
			listChaptersBlog();
		}
		/* page post */
		elseif ($_GET['page'] == 'post') {
			postChapter();
		}
		/* send comment */
		elseif($_GET["page"]== 'click'){
			if ((isset($_GET['id']) && $_GET['id'] > 0) && (isset($_GET['idc']) && $_GET['idc'] > 0)) {
			update_CommentSeen($_GET['id'], $_GET['idc']);
			}
		}
		/* search page exist */
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







