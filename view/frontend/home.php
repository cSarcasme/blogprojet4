
<?php $title = "Accueil"?>

<?php ob_start(); ?>
<section id="slider">
    <div class="container-fluid">
<style>
  /* Make the image fully responsive */
  .carousel-inner img {
      width: 100%;
      
  }
  </style>
</head>
<body>

<div id="demo" class="carousel slide" data-ride="carousel" data-interval="7000" data-pause="hover">
    <ul class="carousel-indicators">
        <li data-target="#demo" data-slide-to="0" class="active"></li>
        <li data-target="#demo" data-slide-to="1"></li>
        <li data-target="#demo" data-slide-to="2"></li>
    </ul>
    <div class="carousel-inner">
        <div class="carousel-item active">
        <img src="public/images/alaska.jpg" alt="Los Angeles" width="1100" height="700">
            <div class="carousel-caption"id="slide1">
                <h1>BILLET POUR L' ALASKA</h1>
                <p class="text-warning"><strong>Le nouveau roman de Jean Forteroche</strong></p>
            </div>   
        </div>
  <!-- <div class="carousel-item">
        <img src="public/images/alaka3.jpg" alt="Chicago" width="1100" height="700">
        <div class="carousel-caption" id="slide2">
            <h3>Chicago</h3>
            <p>Thank you, Chicago!</p>
        </div>   
        </div>
        <div class="carousel-item">
        <img src="public/images/alaka7.jpg" alt="New York" width="1100" height="700">
        <div class="carousel-caption" id="slide3">
            <h3>New York</h3>
            <p>We love the Big Apple!</p>
        </div>   
        </div>-->
    </div>
    <a class="carousel-control-prev" href="#demo" data-slide="prev">
        <span class="carousel-control-prev-icon"></span>
    </a>
    <a class="carousel-control-next" href="#demo" data-slide="next">
        <span class="carousel-control-next-icon"></span>
    </a>
</div>
</div>
</section>
<div class="container-fluid">
    <div class="container">
    <div class="row mt-5">

        <?php

            foreach($posts as $post){
        ?>

            <div class="col-lg-4 col-md-6">
                <div class="card">
                    <div class="hovereffect">   
                        <img class="card-img-top img-responsive" src="public/images/posts/<?= htmlspecialchars($post['image'])?>" alt="<?= htmlspecialchars($post['title'])?>">
                        <div class="overlay">
                            <h2>Effect 14</h2>
                            <a class="info" href="index.php?page=post&amp;id=<?=htmlspecialchars($post['id'])?>">Lire le chapitre</a>
                        </div>    
                    </div>    
                    <div class="card-body">
                        <h4 class="card-title"><?= htmlspecialchars($post['title'])?></h4>
                        <h6 class="text-muted">Le <?= date("d/m/Y à H:i",strtotime(htmlspecialchars($post['date']))); ?> par <?= htmlspecialchars($post['name'])?></h6>
                        <p class="card-text"><?= substr(htmlspecialchars($post['content']),0,200);?>...</p>
                        <a href="index.php?page=post&amp;id=<?=htmlspecialchars($post['id'])?>"><button type="button" class="btn btn-danger btn-sm">Lire la suite</button></a>
                    </div>
                </div>
            </div>
            <?php    
            }
            ?>
    </div>
    </div>
</div>

<?php $content = ob_get_clean(); ?>

<?php require('view/frontend/template.php'); ?>

