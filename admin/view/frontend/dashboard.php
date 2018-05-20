<?php $title = "Tableau de bord";
 ob_start();
?>

<session>
    <div class="container">
        <h1 class="text-center mt-4">TABLEAU DE BORD</h1>
        <div class="row mt-4">
            <!-- Publish-->
            <div class="col-12 col-sm-12 col-md-4 mb-2">
                <div class="card bg-secondary">
                    <div class="card-header"></div>
                    <div class="card-body">
                        <h5 class="card-title text-center text-white"><strong>Publications</strong></h5>
                        <h3 class="card-text cardDashboard text-white"><?= $countPosts['idPosts'] ?></h3>
                    </div>
                </div>
                <form method="post">
                    <div class="row justify-content-center mt-2">
                        <button type="submit"  name="btnPubli" class="btn btn-secondary">Publications</button>
                    </div>    
                </form>
            </div>
            <!-- Comment-->
            <div class="col-12 col-sm-12 col-md-4 mb-2">
                <div class="card bg-info">
                    <div class="card-header"></div>
                    <div class="card-body">
                        <h5 class="card-title text-center text-white"><strong>Commentaires</strong></h5>
                        <h3 class="card-text cardDashboard text-white"><?= $countComments['idComments'] ?></h3>
                    </div>
                </div>
                <form method="post">
                <div class="row justify-content-center mt-2">
                <button type="submit" name="btnComment" class="btn btn-info">Commentaires</button>
                </div>               
                </form>
            </div>
            <!-- Admin-->
            <div class="col-12 col-sm-12 col-md-4 mb-2">
                <div class="card" style="background-color:#F7CD71;">
                    <div class="card-header"></div>
                    <div class="card-body">
                        <h5 class="card-title text-center text-white"><strong>Administrateurs</strong></h5>
                        <h3 class="card-text cardDashboard text-white"><?= $countAdmins['idAdmins'] ?></K>
                    </div>
                </div>
                <form method="post">
                    <div class="row justify-content-center mt-2">
                    <button type="button" class="btn btn-warning text-white justify-content-center" style="background-color:#F7CD71;" >Administrateurs</button>                  
                    </div>
                </form>
            </div>
                <!-- Part Comment when i click on commentaires table comment appear -->
             <?php
             if(isset($_POST['btnComment'])){
            ?>
            <div class="col-12">
                <h2 class="mt-4">Commentaires nons  lus</h2>
            </div>
                   
            <div class="container mt-3"> 
                <div class="d-flex mb-3 ">
                    <div class="mr-auto">Retrouvez tous vox nouveaux commentaires</div>
                    <div class=" size3 badge badge-danger mr-3" id="commentNewSignal"><?= $countCommentsSeenSignal['idComments'] ?> </div>
                    <div class="size3 badge badge-success" id="commentNew"><?= $countCommentsSeen['idComments'] ?></div>
                </div>
            </div>
                 
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th>Chapitres</th>
                        <th>Commentaires</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>

                    <?php 
                    foreach($comments as $comment){                       
                    ?> 
                    <?php  
                    if($comment['seen']=='2'){
                    ?>
                        <tr style="background-color:#ffd3d3;">
                    <?php 
                    }
                    else{
                    ?>
                        <tr style="background-color:#d6ffd8;">
                    <?php
                    } 
                    ?>
                    
                        <td><?=$comment['title']?></td>
                        <td><?= substr($comment['comment'],0,50)?></td>
                        <td>
                            <!-- bouton update comment dashboard-->
                            <a href="#" data-toggle="modal" data-target="#mymodalok<?php echo $comment['id'] ?>"><i class="fas fa-check fa-2x text-success"></i></a>
                            
                            <!-- The Modal update comment -->
                            <div class="modal fade" id="mymodalok<?php echo $comment['id'] ?>">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                    
                                        <div class="modal-header">
                                            <h4 class="modal-title">voulez vous valider ce commentaire</h4>
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>
                                        
                                        <div class="modal-body">
                                            <p>Par <strong><?=$comment['name']?></strong> <span class="size text-muted">Le <?= date("d/m/Y H:i ",strtotime(htmlspecialchars($comment['date'])))?></span></p>
                                            <p><em><?=$comment['comment']?></em></p>
                                            <p class="size1 text-right">De <span class="text-info"><?=$comment['email']?></span></p>
                                        </div>
                                        
                                        <div class="modal-footer">

                                            <?php
                                            if(isset($_POST['update'])){
                                                $update_Comment = new deleteUpdateComment();
                                                $updateComment = $update_Comment -> update_Comments($comment['id']);
                                                header('Location:admin.php?page=dashboard');
                                                return $updateComment;
                                            }
                                            ?>

                                            <form method="post">
                                                <button type="submit" name="update" class="btn btn-success">Oui</button>
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Non</button>
                                            </form>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>

                            <!-- bouton delete comment dashboard-->
                            <a href="#" data-toggle="modal" data-target="#mymodaldelete<?php echo $comment['id'] ?>"><i class="fas fa-trash fa-2x text-danger"></i></a>

                            <!-- The Modal delete comment -->
                            <div class="modal fade" id="mymodaldelete<?php echo $comment['id'] ?>">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                    
                                        <div class="modal-header">
                                        <h4 class="modal-title">Voulez vous supprimer ce commentaire</h4>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>
                                        
                                        <div class="modal-body">
                                            <p>Par <strong><?=$comment['name']?></strong> <span class="size text-muted">Le <?= date("d/m/Y H:i ",strtotime(htmlspecialchars($comment['date'])))?></span></p>
                                            <p><em><?=$comment['comment']?></em></p>
                                            <p class="size1 text-right">De <span class="text-info"><?=$comment['email']?></span></p>
                                        </div>
                                        
                                        <div class="modal-footer">
                                            <?php
                                            if(isset($_POST['delete'])){
                                                $delete_Comment = new deleteUpdateComment();
                                                $deleteComment = $delete_Comment -> delete_Comments($comment['id']);
                                                header('Location:admin.php?page=dashboard');
                                                return $deleteComment;
                                            }
                                            ?>
                                            <form method="post">    
                                                <button type="submit" name="delete" class="btn btn-danger">Oui</button>
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Non</button>
                                            </form>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>

                            <!-- bouton see comment dashboard-->
                            <a href="#" data-toggle="modal" data-target="#mymodalsee<?php echo $comment['id'] ?>" ><i  class="fas fa-eye fa-2x text-primary" ></i></a>

                            <!-- The Modal see comment -->
                            <div class="modal fade" id="mymodalsee<?php echo $comment['id'] ?>">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                    
                                        <div class="modal-header">
                                        <h4 class="modal-title"><?=$comment['title']?></h4>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>
                                        
                                        <div class="modal-body">
                                            <p>Par <strong><?=$comment['name']?></strong> <span class="size text-muted">Le <?= date("d/m/Y H:i ",strtotime(htmlspecialchars($comment['date'])))?></span></p>
                                            <p><em><?=$comment['comment']?></em></p>
                                            <p class="size1 text-right">De <span class="text-info"><?=$comment['email']?></span></p>
                                        </div>
                                        
                                        <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>

                    <?php
                    }
                    ?>

                    </tbody>
            </table>
            <?php
             }
             if(isset($_POST['btnPubli'])){               
             ?>
             <div class="col-12">
                <h2 class="mt-4">Mes publications</h2>
            </div>
                   
            <div class="container mt-3"> 
                <div class="d-flex mb-3 ">
                    <div class="mr-auto">Retrouvez toutes vos publications</div>
                    <div class=" size3 badge badge-danger mr-3" id="commentNewSignal"><?= $countPostsNoPublish['idPosts'] ?>/NP </div>
                    <div class="size3 badge badge-success" id="commentNew"><?= $countPostsPublish['idPosts'] ?>/P</div>
                </div>
            </div>

                        <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th>Titre</th>
                        <th>Contenu</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>

                    <?php 
                    foreach($posts as $post){                       
                    ?> 
                    <?php  
                    if($post['posted']=='0'){
                    ?>
                        <tr style="background-color:#ffd3d3;">
                    <?php 
                    }
                    else{
                    ?>
                        <tr style="background-color:#d6ffd8;">
                    <?php
                    } 
                    ?>
                    
                        <td><?=substr($post['title'],0,35)?></td>
                        <td><?= substr($post['content'],0,50)?>...</td>
                        <td>
                            <!-- bouton valid comment dashboard-->
                            <a href="#" data-toggle="modal" data-target="#mymodalok<?php echo $post['id'] ?>"><i class="fas fa-check fa-2x text-success"></i></a>
                            
                            <!-- The Modal valid comment -->
                            <div class="modal fade" id="mymodalok<?php echo $post['id'] ?>">
                                <div class="modal-dialog modal-dialog-centered ">
                                    <div class="modal-content modalPublish">
                                    
                                        <div class="modal-header">
                                            <h4 class="modal-title">Voulez vous publier ce commentaire</h4>
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>
                                        
                                        <div class="modal-body">
                                            <p><strong><?=$post['title']?></strong> <span class="size text-muted">Le <?= date("d/m/Y H:i ",strtotime(htmlspecialchars($post['date'])))?></span></p>
                                            <p><em><?=substr($post['content'],0,300)?>...</em></p>
                                            <p class="size1 text-right">De <span class="text-info"><?=$post['name']?></span></p>
                                        </div>
                                        
                                        <div class="modal-footer">

                                            <?php
                                            if(isset($_POST['update'])){
                                                $update_Comment = new deleteUpdateComment();
                                                $updateComment = $update_Comment -> update_Comments($comment['id']);
                                                header('Location:admin.php?page=dashboard');
                                                return $updateComment;
                                            }
                                            ?>

                                            <form method="post">
                                                <button type="submit" name="publish" class="btn btn-success">Publier</button>
                                                <button type="button" name="noPublish" class="btn btn-secondary" data-dismiss="modal">Retirer</button>
                                            </form>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>


                        </td>
                    </tr>

                    <?php
                    }
                    ?>

                    </tbody>
            </table>
            <?php
            }
             ?>
        </div>
    </div>
</session>


<?php $content = ob_get_clean(); ?>

<?php require('view/frontend/template.php'); ?>