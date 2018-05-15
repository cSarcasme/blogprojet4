<?php
try{
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
	}
}
catch(Exception $e) {
    echo 'Erreur : ' . $e->getMessage();
}
?>



<?php ob_start(); ?>
<header>
    <?php
    include('body/topbar.php');
    ?>
</header>
<main>
	<?php
        include('view/frontend/'.$page.'.php');
        
	?>	
</main>

<footer>
	<?php
	include('body/footer.php');
	?>

</footer>
<?php $content = ob_get_clean(); ?>

<?php require('view/frontend/template.php'); ?>
