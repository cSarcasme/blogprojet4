<div class="container">
    <h1>Blog</h1>
    <section class="my-5">

  <!-- Section heading -->
  <h2 class="h1-responsive font-weight-bold text-center my-5">Mes Chapitres</h2>
  <!-- Section description -->
  <p class="text-center dark-grey-text w-responsive mx-auto mb-5">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

  <!-- Grid row -->

        <?php
            $posts = get_posts();
            foreach($posts as $post){
        ?>
        
        <div class="row">

    <!-- Grid column -->
    <div class="col-lg-5 col-xl-4">

      <!-- Featured image -->
      <div class="view overlay rounded z-depth-1-half mb-lg-0 mb-4">
        <img class="img-fluid" src="public/images/posts/<?=htmlspecialchars($post['image'])?>" alt="Sample image">
        <a>
          <div class="mask rgba-white-slight"></div>
        </a>
      </div>

    </div>
    

    <!-- Grid column -->
    <div class="col-lg-7 col-xl-8">

      <!-- Post title -->
      <h3 class="font-weight-bold mb-3"><strong><?=htmlspecialchars($post['title'])?></strong></h3>
      <!-- Excerpt -->
      <p class="dark-grey-text"><?=substr(htmlspecialchars($post['content']),0,500)?>...</p>
      <!-- Post data -->
      <p>Par <a class="font-weight-bold"><?=htmlspecialchars($post['name'])?></a>, <a class="text-muted">le <?= date("d/m/Y à H:i",strtotime(htmlspecialchars($post['date']))); ?></a></p>
      <!-- Read more button -->
      <a href="index.php?page=post&amp;id=<?=htmlspecialchars($post['id'])?>" class="btn btn-primary btn-md">Lire la suite</a>

    </div>
    <!-- Grid column -->

  </div>
  <!-- Grid row -->

  <hr class="my-5">
               
            
        <?php    
        }
        ?>
   
</div>