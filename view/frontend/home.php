
<div class="container">
<h1>Page d'accueil</h1>
    <div class="row"> 

        <?php
            $posts = get_posts();
            foreach($posts as $post){
        ?>
         
        <div class="col-lg-6">
            <div class="card">
            <img class="card-img-top" src="<?= $post['image']?>" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title"><?= $post['title']?></h5>
                    <p class="card-text"><?= $post['content']?></p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
        </div>
        <?php    
            }
        ?>

        
        
    </div>
</div>