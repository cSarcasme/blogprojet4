<!--page home-->
<?php $title = "Accueil"?>
<?php ob_start(); ?>

<!-- slider -->
<section id="slider">
        <style>
        /* Make the image fully responsive */
        .carousel-inner img {
            width: 100%;
            
        }
        </style>

        <div id="demo" class="carousel slide" data-ride="carousel" data-interval="15000">
            <ul class="carousel-indicators">
                <li data-target="#demo" data-slide-to="0" class="active"></li>
                <li data-target="#demo" data-slide-to="1"></li>
            </ul>
            <div class="carousel-inner">
                <div class="carousel-item active">
                <img src="public/images/alaska.jpg" alt="Los Angeles" width="1100" height="700">
                    <div class="carousel-caption"id="slide1">
                        <h1 class="ml3">BILLET POUR L' ALASKA</h1>
                        <p class="ml3 text-warning font-weight-bold"><strong>Le nouveau roman de Jean Forteroche</strong></p>
                    </div>   
                </div>
                <div class="carousel-item">
                    <img src="public/images/alaka3.jpg" alt="Chicago" width="1100" height="700">
                    <div class="carousel-caption" id="slide2">
                        <h3 class="ml3">Que seriez-vous prêts à faire pour survivre ?</h3>
                    </div>   
                </div>
            </div>
            <a class="carousel-control-prev" href="#demo" data-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </a>
            <a class="carousel-control-next" href="#demo" data-slide="next">
                <span class="carousel-control-next-icon"></span>
            </a>
        </div>
</section>

<!-- last chapter -->
<section class="mt-5">
    <div class="container">
    <h3 style="text-align:center;"> Mes 3 derniers chapitres </h3>
        <div class="row mb-5 mt-3">
            <?php
                /*display 3 chapter post on home */
                foreach($posts as $post){
                    $content=html_entity_decode($post['content']);
            ?>
            <div class="col-md-4 col-12">
                <div class="card" id="cardHome">
                    <img class="card-img-top" src="public/images/posts/<?= htmlspecialchars($post['image'])?>" alt="<?= htmlspecialchars($post['title'])?>"width="100%" height="216px">                    
                    <div class="card-body">
                        <h4 class="card-title"><?= htmlspecialchars($post['title'])?></h4>
                        <h6 class="text-muted">Le <?= date("d/m/Y à H:i",strtotime(htmlspecialchars($post['date']))); ?> par <?= htmlspecialchars($post['name'])?></h6>
                        <p class="card-text"><?=  substr($content ,0,50);?>...</p>
                        <a href="index.php?page=post&amp;id=<?=htmlspecialchars($post['id'])?>"><button type="button" class="btn btn-danger btn-sm">Lire la suite</button></a>
                    </div>
                </div>
            </div>
            <?php    
            }
            ?>
        </div>
    </div>
<section>
<!-- part best comment -->
<section>
    <div class="container mb-5">
        <div class="row" style="background:#F7CD71;">
            <div class="col-12">
                <h4 class="text-white">Meilleur commentaire</h4>
                <div class="media border p-3 mb-3 mt-3 bg-white">
                    <img src="public/images/img_avatar3.png" alt="image comment user" class="mr-3 mt-3 rounded-circle" style="width:60px;">
                    <div class="media-body">
                        <h4>Par <strong>Charles Dupuy</strong><em class="text-muted"> Le 09/06/2018</em></h4>
                        <p>Sympa ce roman nouvelle au format web. De plus l' intrigue arrive vite j' ai hate à l' édition de la semaine prochaine.</p>      
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<?php $content = ob_get_clean(); ?>

<?php require('view/frontend/template.php'); ?>

