
    
<?php $title = "chapitre"?>

<?php ob_start(); ?>   
    <section  class="postContentImage" id="postImageChapter">
        <div class="container-fluid">   
            <div class="postContentImage" >
                <img src="public/images/posts/<?= htmlspecialchars($post['image'])?>"  id="imageChapter" class="postContentImage" />
            </div>
        <div class="row" id="postTitleImages">
                <div class="col-lg-12 col-md-12 col-sm-12 post-title-block">
                    <h1 class="text-center"><?= htmlspecialchars($post['title'])?></h1>
                    <ul class="list-inline text-center" id="listTitlePost">
                        <li><?= date("d/m/Y à H:i",strtotime(htmlspecialchars($post['date']))); ?></li>
                        <li>Jean Forteroche</li>
                    </ul>
                </div>
                </div>
        </div>
    </section>

    <section class="post-content-section ">
        <div class="container">
            <div class="row"> 
                <div class="col-lg-9 col-md-9 col-sm-12" id="textTitlePost">
                    <div id="chapterTextContent">
                        <p class="lead">Nullam quis risus eget urna mollis ornare vel eu leo. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nullam id dolor id nibh ultricies vehicula.</p>
                        <p class="text"><?= substr(htmlspecialchars($post['content']),0,5000);?></p>
                    </div>
                    <div class="postBlogComment ">
                        <h4>Commentaires</h4>
                        <?php
                
                        foreach($comments as $comment){
                            
                                
                            
                        ?>

                        <div class="card colorFondChapter mb-3">
                            <div class="card-body">
                            <h5 class="card-title">Par <strong><?=htmlspecialchars($comment['name'])?></strong><span class="text-muted" id="chapterDateComment"> Le <?= date("d/m/Y",strtotime(htmlspecialchars($post['date']))); ?></span> </h5>
                            <p class="card-text"><?= htmlspecialchars($comment['comment'])?></p>
                            <a href="index.php?page=click&amp;id=<?=$post['id']?>&amp;idc=<?=$comment['id']?>" name="mise" class="card-link" id="signal" style="float:right;"><i class="fas fa-flag mr-1"></i>Signaler un abus</a>
                            <a href="#" class="card-link ml-2"><i class="fas fa-thumbs-up fa-sm"></i>+</a>
                            <a href="#" class="card-link ml-2"><i class="fas fa-thumbs-down fa-sm"></i>+</a>
                            </div>
                        </div>
                        <?php
                        }
                        ?>
                        <?php
                        if(isset($_POST['submit'])){
                            $name = htmlspecialchars(trim($_POST['name']));
                            $email = htmlspecialchars(trim($_POST['email']));
                            $comment = htmlspecialchars(trim($_POST['comment']));
                            $errors=array();
                    
                            if(empty($name) || empty($email) || empty($comment)){
                                $errors['empty'] = "Tous les champs ne sont pas remplis.";
                            }
                            else{
                                if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                                    $errors['email'] = "L' adresse email n' est pas valide.";
                                }
                            }

                            if(!empty($errors)){
                                ?>

                                <div class="alert alert-danger"> 
                                    <?php
                                        foreach($errors as $error){
                                            echo "<strong>"."ATTENTION!!! "."</strong>". $error."<br/>";
                                        }
                                    ?>
                                </div>
                                <?php
                            }
                            else{
                                
                                ?>

                                <?php
                                post_comment($_GET['id'],$name, $email, $comment);
                            }
                        }
                        ?>
                        <h4>Laisser un commentaire</h4>  
                        <form method="post">
                            <div class="row postBlogComment">
                                <div class="form-group col-sm-12 col-md-6">
                                    <label for="name"><i class="fas fa-user bg-secondary"></i></label>
                                    <input type="text" name="name" id="name" placeholder="Nom" class="form colorFondChapterForm"/>
                                </div>
                                <div class="form-group col-sm-12 col-md-6">
                                    <label for="email"><i class="fas fa-envelope bg-secondary"></i></label>
                                    <input type="email" name="email" id="email" placeholder="Email" class="form colorFondChapterForm"/>
                                </div>
                                <div class="form-group col-sm-12 col-md-12">
                                    <label for="comment"><i class="fas fa-comment-dots bg-secondary"></i></i></label>
                                    <textarea name="comment" id="comment" placeholder="Commentaire" class="form colorFondChapterForm"></textarea>
                                </div>
                                <div class="col-sm-12">
                                    <button type="submit" name="submit" class="btn btn-primary">Commenter</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-3  col-md-3 col-sm-12">
                    <div class="well">
                        <h2>Autheur</h2>
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
        </div> 
    </section>
<?php $content = ob_get_clean(); ?>

<?php require('view/frontend/template.php'); ?>


