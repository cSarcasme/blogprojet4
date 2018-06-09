<?php
require_once('model/postManager.php');
$blogManager=new ced\Blog\projet4\blogManager();
    $posts = $blogManager->getPosts();
?>
<!--top bar of part no admin -->
  
  <nav class="navbar navbar-expand-lg navbar-dark fixed-top"  style="background-color:#161C27;">
    <a class="navbar-brand text-primary" href="index.php?page=home">
      <img src="public/images/jf-logo.jpg" width="30" height="30" class="d-inline-block align-top" alt="logo jean forteroche "> Jean Forteroche
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown"
      aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <div class="container">
        <div class="d-flex justify-content-end">"
      <ul class="navbar-nav">
        <li class="nav-item active">
          <a class="nav-link" href="index.php?page=home">ACCUEIL
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="index.php?page=blog">BLOG</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            CHAPITRES
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <?php
            foreach ($posts as $post){

            ?>
            <a class="dropdown-item" href="index.php?page=post&amp;id=<?= $post['id']?>"><?= $post['title']?></a>
            <?php
            }
            ?>
          </div>
        </li>
      </ul>
      </div>
      </div>    
  </div>
</nav>


