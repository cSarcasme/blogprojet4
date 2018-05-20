<?php $title = "Article";
 ob_start();
?>
<session>
    <div class="container">
    <h1 class="text-center mt-4 mb-4">POSTER UN ARTICLE</h1>
        <form method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="form-group col-12">
                    <input type="name" name ="titre" placeholder="titre de l' article" class="form mb-5">
                </div>
                <div class="form-group col-12">
                    <textarea name="contenu" placeholder="Contenu de l' article" class="form mb-5"></textarea>
                <div>

                <?php
                    if(isset($_POST['postArticle'])){
                        $title=htmlspecialchars($_POST['titre']);
                        $content=htmlspecialchars($_POST['contenu']);
                        $posted=($_POST['checkbox']);
                        $image=$_FILES['file'];
                        $errors=array();

                        if(isset($posted)){
                            $posted="1";
                        }
                        else{
                            $posted="0";
                        }

                        if(empty($title) or empty($content)){
                            $errors['empty'] = "Veuillez remplir tous les champs";
                        }

                        if (isset($image) AND $image['error'] == 0){
                            if ($_FILES['file']['size'] <= 1000000){

                                $infosfichier = pathinfo($image['name']);
                                $extension_upload = $infosfichier['extension'];
                                $extensions_autorisees = array('jpg', 'jpeg', 'gif', 'png');
                                
                                if (in_array($extension_upload, $extensions_autorisees)){
                                    move_uploaded_file($image['tmp_name'], '../public/images/' . basename($_FILES['file']['name']));
                                } 
                                else{
                                    $errors['format'] = "Format de fichier non autorisé";
                                }   
                            }
                            else{
                                $errors['size'] = "Image qui dépasse la taille autorisé";
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
                            post_Post($title, $content, $image, $posted);
                        }
                    }
                ?>

                <div class="row mt-3">
                    <div class="col-12 col-md-5 mt-3">
                        <div class="form-group ">
                            <div class="input-group">
                                <span class="input-group-btn">
                                    <span class="btn btn-default btn-file">
                                    <button  class="btn btn-info">Charger image</button> <input type="file" name="file" id="imgInp">
                                    </span>
                                </span>
                                <input type="text" class="form2"  readonly>
                            </div>
                            <img id='img-upload'/>
                        </div>
                    </div>
                    <div class="col-12 col-md-4 mt-3">
                        <div class="col-12">
                            <p><strong>Public</strong></p> 
                        </div>
                        <div class="col-12">
                            <div class="material-switch pull-right">
                                <span class="mr-3"> Non</span>
                                <input id="someSwitchOptionDefault" name="checkbox" type="checkbox" value="on"/>
                                <label for="someSwitchOptionDefault" class="label-default bg-info"></label>
                                <span class="ml-5"> Oui</span>
                            </div>       
                        </div>   
                    </div>
                    <div class="col-12 col-md-1 mt-5">
                        <button type="submit" name="postArticle" class="btn btn-info pl-5 pr-5 ">Publier</button>
                    </div>
                </div>     
            </div>
        </form>
    </div>
</session>

<?php $content = ob_get_clean(); ?>

<?php require('view/frontend/template.php'); ?>