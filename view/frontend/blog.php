<!--page blog all chapter -->
<?php $title = "Blog"?>

<?php ob_start(); ?>
<div class="container pt-5">
    <section class="my-5">
 
    <h2 class=" h1-responsive font-weight-bold text-center my-5">Mes Chapitres</h2>
    <p class="text-center dark-grey-text w-responsive mx-auto mb-5">Toutes les semaines venez retrouver un nouveau chapitre du roman nouvelle de Jean Forteroche</p>

    <?php          
    foreach($posts as $post){
    ?>
        
    <div class="row">
        <div class="col-lg-5 col-xl-4">
            <div class="view overlay rounded z-depth-1-half mb-lg-0 mb-4">
                <img class="img-fluid" src="public/images/posts/<?=htmlspecialchars($post['image'])?>" alt="Sample image">
                <a>
                    <div class="mask rgba-white-slight"></div>
                </a>
             </div>
        </div>
        <div class="col-lg-7 col-xl-8">
            <h3 class="font-weight-bold mb-3"><strong><?=htmlspecialchars($post['title'])?></strong></h3>
            <p class="text-muted"><?=substr(htmlspecialchars($post['content']),0,500)?>...</p>
            <p>Par <a class="font-weight-bold">Jean Forteroche</a>, <a class="text-dark"><em style="font-size:12px;">le <?= date("d/m/Y à H:i",strtotime(htmlspecialchars($post['date']))); ?></em></a></p>
            <a href="index.php?page=post&amp;id=<?=htmlspecialchars($post['id'])?>" class="btn btn-danger btn-md ">Lire la suite</a>
        </div>
    </div>
    <hr class="my-5">   
    <?php    
    }
    ?> 
</div>
<?php $content = ob_get_clean(); ?>

<?php require('view/frontend/template.php'); ?>