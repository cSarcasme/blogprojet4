<?php $title = "Error"; ?>
<?php ob_start(); ?>
    <h1>Aie aie aie .....</h1>
    <?= $e->getMessage() ?>
    <figure>
        <img src="" alt="error image" />
    </figure>
    
<?php $content = ob_get_clean(); ?>
<?php require('view/frontend/template.php'); ?>





