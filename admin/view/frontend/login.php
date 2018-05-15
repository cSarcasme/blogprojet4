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
                        if(isset($_POST['submit'])){
                            $name = htmlspecialchars(trim($_POST['name']));
                            $password = htmlspecialchars(trim($_POST['password']));
                            $errors=array();
                        }
                        ?>
                        <form method="post">
                            <div class="row">
                                <div class="col-12 mt-3">
                                    <laber for="email">Adresse email</label>
                                    <input type="email" name"email" id="email" class="form">                              
                                </div>
                            
                                <div class="col-12 mt-3">
                                    <laber for="password">Mot de passe</label>
                                    <input type="password" name"password" id="password" class="form">                              
                                </div>

                                <div class="checkbox ml-3 mt-3">
                                    <label><input type="checkbox" value=""> Connexion automatique</label>
                                </div>

                                <div class="col-12 text-center mt-4" id="buttonLogin" >
                                    <button type="button" type="submit" class="btn btn-primary ">SE CONNECTER</button>
                                </div>

                                
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>