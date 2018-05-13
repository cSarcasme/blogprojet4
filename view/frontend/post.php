
    <?php
    $post = get_post();
    if($post == false ){
        header("Location:index.php?page=error");
    }
    ?>
    <section class="banner-section">
        <div id="posImageChapter">
            <img src="public/images/posts/<?= htmlspecialchars($post['image'])?>" id="imageChapter" />
        </div>
    </section>
    <section class="post-content-section">
        <div class="container">

            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 post-title-block">
               
                    <h1 class="text-center"><?= htmlspecialchars($post['title'])?></h1>
                    <ul class="list-inline text-center" id="listTitlePost">
                        <li><?= date("d/m/Y à H:i",strtotime(htmlspecialchars($post['date']))); ?></li>
                        <li>Jean Forteroche</li>
                    </ul>
                </div>
                <div class="col-lg-9 col-md-9 col-sm-12" id="textTitlePost">
                    <p class="lead">Nullam quis risus eget urna mollis ornare vel eu leo. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nullam id dolor id nibh ultricies vehicula.</p>
                    <p class="text"><?= substr(htmlspecialchars($post['content']),0,5000);?></p>

                    <h4>Commentaires</h4>
                    
                </div>
                <div class="col-lg-3  col-md-3 col-sm-12">
                    <div class="well">
                        <h2>Autheur</h2>
                        <img src="" class="img-rounded" />
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna</p>
                        <a href="#" class="btn btn-default">Read more</a>
                    </div>
                    <div class="well">
                        <h2>Chapitre</h2>
                        <ul class="nav flex-column nav-tabs">
                            <li class="nav-item ">
                            <a class="nav-link" href="#">Chapitre 1</a>
                            </li>
                            <li class="nav-item bg-dark">
                            <a class="nav-link" href="#">Chapitre 2</a>
                            </li>
                            <li class="nav-item">
                            <a class="nav-link active" href="#">Chapitre 1</a>
                            </li>
                            <li class="nav-item">
                            <a class="nav-link active" href="#">Dis</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div> <!-- /container -->
    </section>
    
    
   
    
    <?php
    ?>

