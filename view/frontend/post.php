
    <?php
    $post = get_post();
    if($post == false ){
        header("Location:index.php?page=error");
    }
    ?>
    
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

    <section class="post-content-section">
        <div class="container">
            <div class="row"> 
                <div class="col-lg-9 col-md-9 col-sm-12" id="textTitlePost">
                    <p class="lead">Nullam quis risus eget urna mollis ornare vel eu leo. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nullam id dolor id nibh ultricies vehicula.</p>
                    <p class="text"><?= substr(htmlspecialchars($post['content']),0,5000);?></p>
                    <div class="postBlogComment">
                        <h4>Laisser un commentaire</h4>
                        
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
                            }else{
                                ?>
                                                      
                                <div class="alert alert-success"> 
                                    <?= "<strong>"."REUSSI! "."</strong>"."Votre commentaire a été envoyé."."<br/>";?>
                                </div>

                                <?php
                                post_comment($name, $email, $comment);
                                ?>

                                <script>
                                    windows.location.replace("index.php?page=post&id=<?=$_GET['id']?>");
                                </script>
                                <?php
                            }
                        }
                       ?>
                        <form method="post">
                            <div class="row postBlogComment">
                                <div class="form-group col-sm-12 col-md-6">
                                    <label for="name"><i class="fas fa-user bg-secondary"></i></label>
                                    <input type="text" name="name" id="name" placeholder="Nom" class="form"/>
                                </div>
                                <div class="form-group col-sm-12 col-md-6">
                                    <label for="email"><i class="fas fa-envelope bg-secondary"></i></i></label>
                                    <input type="text" name="email" id="email" placeholder="Email" class="form"/>
                                </div>
                                <div class="form-group col-sm-12 col-md-12">
                                    <label for="comment"><i class="fas fa-comment-dots bg-secondary"></i></i></label>
                                    <textarea name="comment" id="comment" placeholder="Commentaire" class="form"></textarea>
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


