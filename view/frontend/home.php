
<?php $title = "Accueil"?>

<div class="container">
    <h1>Page d'accueil</h1>
    <div class="row">

        <?php
            $posts = get_posts();
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
                        <a href="index.php?page=post&amp;id=<?=htmlspecialchars($post['id'])?>"><button type="button" class="btn btn-primary btn-sm">Lire la suite</button></a>
                    </div>
                </div>
            </div>
            <?php    
            }
            ?>
    </div>
</div>

