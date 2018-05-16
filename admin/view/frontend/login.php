<?php $title = 'Login'?>

<?php ob_start(); ?> 

<div class="container-fluid" style="background-color:#f7cd71;">

    <div class="row justify-content-center">
        <div class="col-auto mt-5">
            <div class="card border border-dark" style="width: 18rem;">
                <div class="row ">
                    <div class="col-6 offset-3">
                        <img class="card-img-top" src="../public/images/admin.png" alt="Card image cap">
                    </div>
                </div>
                    <div class="card-body ">
                        <h4 class="card-title text-center">Se connecter</h4>

                        <?php
                        
                        
                        if(isset($_POST['submit'])){
                            $email = htmlspecialchars(trim($_POST['email']));
                            $pseudo = htmlspecialchars(trim($_POST['email']));
                            $password = htmlspecialchars(trim($_POST['password']));
                            $isPasswordCorrect = password_verify($password, $result['password']);
                            
    
                            
                            if((!empty($pseudo) || !empty($email)) &&  !empty($password)){
                                if($isPasswordCorrect){
                                    $_SESSION['id'] = $result['id'];
                                    $_SESSION['pseudo'] or $_SESSION['email']  = $email or $pseudo;
                                 dashboard();
                                }
                                else{
                                 ?>
                                 <div class="alert alert-danger">
                                     <p>Mauvais email ou mot de passe !</p>  
                                 </div>
                                 <?php
                                }
                             }
                             else{
                                 ?>
                                 <div class="alert alert-danger">
                                     <p>Tous les champs ne sont pas remplis</p>  
                                 </div>
                                 <?php
                             }
                        }
                        ?>
                        <form method="post">
                            <div class="row">
                                <div class="col-12 mt-3">
                                    <laber for="email"></label>
                                    <input type="email" name="email" id="email" class="form">                              
                                </div>
                            
                                <div class="col-12 mt-3">
                                    <laber for="userPassword">Mot de passe</label>
                                    <input type="password" name="password" id="userPassword" class="form">                              
                                </div>

                                <div class="checkbox ml-3 mt-3">
                                    <label><input type="checkbox" value=""> Connexion automatique</label>
                                </div>

                                <div class="col-12 text-center mt-4" id="buttonLogin" >
                                    <button  type="submit" name="submit" id="submit" class="btn btn-primary ">SE CONNECTER</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $content = ob_get_clean(); ?>

<?php require('view/frontend/template.php'); ?>