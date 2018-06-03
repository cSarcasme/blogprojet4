<?php $title = "Tableau de bord";
 ob_start();
?>

<session>
    <div class="container">
        <?php include('body/dashboard.php')?>
    </div>
</session>


<?php $content = ob_get_clean(); ?>

<?php require('view/frontend/template.php'); ?>