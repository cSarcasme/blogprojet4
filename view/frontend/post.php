
    
<?php $title = "chapitre"?>

<?php ob_start(); ?>   
<section  class="postContentImage" id="postImageChapter">
        <!--<div class="container-fluid">   -->
            <div class="postContentImage" >
                <img src="public/images/posts/<?= htmlspecialchars($post['image'])?>"  id="imageChapter" class="postContentImage" />
            </div>
            <div  id="postTitle">
                <div class="d-flex justify-content-center">
                    <h1 class="text-center text-black p-1">BILLET POUR L' ALASKA</h1>
                </div>
            </div>
     <!--   </div>-->
    </section>

    <section class="post-content-section pt-3">
            <div class="container">
                <div class="row" id="encadr"> 
                    <div class="col-lg-9 col-md-9 col-sm-12" >
                        <p class="text-right size1 mt-4 mr-4  text-muted">Le <?= date("d/m/Y à H:i",strtotime(htmlspecialchars($post['date']))); ?></p> 
                        <div id="chapterTextContent">
                        <div class="d-flex justify-content-center">
                            <h3 class="text-center text-white  px-2 pb-1 bg-danger"><?= htmlspecialchars($post['title'])?></h3>
                        </div>
                        <p class="lead font-weight-bold">Toutes les semaines venez retrouver un nouveau chapitre du roman nouvelle de Jean Forteroche</p>
                        <div id="text-post"><?= html_entity_decode($post['content']);?></div>
                        <p class="text-center font-weight-bold text-dark">Jean Forteroche</p>
                    </div>
                    </div>
                    <div class="col-lg-3  col-md-3 col-sm-12">
                        <div class="well mt-4 px-3" id="auteur">                
                            <img src="public/images/Jean_forteroche.jpg" class="rounded-circle mx-auto d-block" alt="Jean forteroche" width="150" height="100">    
                            <p>Jean forteroche est un écrivain français né en 1965 en Normandie. Il connaît son premier grand succès en 2011 avec Nymphéas Noirs. Ses polars se vendent à des milliers d'exemplaires, le classant 2e auteur le plus vendu de France en 2017. 
                                Aujourdh'ui il nous propose son nouveau roman nouvelle <strong>BILLET POUR L' ALASKA</strong> au format web .
                            </p>
                        </div>
                    
                 <!--   <div class="well">
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
                    </div>-->
                </div>        
                    <div class="col-lg-9 col-md-9 col-sm-12 mt-3">
                        <h2>Commentaires</h2>

                        <?php               
                        foreach($comments as $comment){                        
                        ?>
                            <div class="media border p-3 mb-3 mt-3">
                                <img src="public/images/posts/img_avatar3.png" alt="image comment user" class="mr-3 mt-3 rounded-circle" style="width:60px;">
                                <div class="media-body">
                                    <h4><?=htmlspecialchars($comment['name'])?> <span class="text-muted" id="chapterDateComment"><em> Le <?= date("d/m/Y à H:i",strtotime(htmlspecialchars($post['date']))); ?></em></span></h4>
                                    <p><?= htmlspecialchars($comment['comment'])?></p>      
                                    <a href="index.php?page=click&amp;id=<?=$post['id']?>&amp;idc=<?=$comment['id']?>" class="text-danger" style="float:right;"><i class="fas fa-flag mr-1"></i>Signaler un abus</a>
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
                                    <label for="name"><i class="fas fa-user bg-info text-white p-2"></i></label>
                                    <input type="text" name="name" id="name" placeholder="Nom" class="form"/>
                                </div>
                                <div class="form-group col-sm-12 col-md-6">
                                    <label for="email"><i class="fas fa-envelope bg-info text-white p-2"></i></label>
                                    <input type="email" name="email" id="email" placeholder="Email" class="form"/>
                                </div>
                                <div class="form-group col-sm-12 col-md-12">
                                    <label for="comment"><i class="fas fa-comment-dots bg-info text-white p-2"></i></i></label>
                                    <textarea name="comment" id="comment" placeholder="Commentaire" class="form"></textarea>
                                </div>
                                <div class="col-sm-12 mb-3">
                                    <button type="submit" name="submit" class="btn btn-info">Commenter</button>
                                </div>
                            </div>
                        </form>
                    </div>
                            
            </div>
        </div> 
    </section>
<?php $content = ob_get_clean(); ?>

<?php require('view/frontend/template.php'); ?>


