<?php $title = 'Login'?>
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
                        $result=is_Admin($_POST['email'], $_POST['password']);
                        
                        if(isset($_POST['submit'])){
                            $email = htmlspecialchars(trim($_POST['email']));
                            $password = htmlspecialchars(trim($_POST['password']));
                            $isPasswordCorrect = password_verify($password, $result['password']);
                            $errors=array();

                            if(empty($email) or empty($password)){
                                $errors['empty'] = 'Tous les champs ne sont pas remplis';
                            }
                            else if(($email!=$result['email']) && ($isPasswordCorrect == false)){
                                $errors['exist'] = 'Mauvais email ou mot de passe !';
                            }

                            if(!empty($errors)){
                                ?>

                                <div class="alert alert-danger"> 
                                    <?php
                                        foreach($errors as $error){
                                            echo  $error."<br/>";
                                            echo $result['id'];
                                        }
                                    ?>
                                </div>
                                <?php
                            }
                            else{
                                $_SESSION['id'] = $result['id'];
                                $_SESSION['email'] = $email;
                                header('Location:index.php?page=dashboard');
                            }
                        }
                        ?>
                        <form method="POST">
                            <div class="row">
                                <div class="col-12 mt-3">
                                    <laber for="email"><?= $result['id']?></label>
                                    <input type="email" name"email" id="email" class="form">                              
                                </div>
                            
                                <div class="col-12 mt-3">
                                    <laber for="userPassword">Mot de passe</label>
                                    <input type="password" name"password" id="userPassword" class="form">                              
                                </div>

                                <div class="checkbox ml-3 mt-3">
                                    <label><input type="checkbox" value=""> Connexion automatique</label>
                                </div>

                                <div class="col-12 text-center mt-4" id="buttonLogin" >
                                    <button  type="submit" name="submit" class="btn btn-primary ">SE CONNECTER</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>