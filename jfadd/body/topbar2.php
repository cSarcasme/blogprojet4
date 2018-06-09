
<!--topbar for dashboard-->
<nav class="navbar navbar-expand-lg navbar-dark" style="background-color:#161C27;">
    <a class="navbar-brand" href="admin.php?page=dashboard">
        <img src="../public/images/jf-logo.jpg" width="30" height="30" class="d-inline-block align-top" alt=""> Jean Forteroche
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <div class="container-fluid">
            <div class="dropdown">
                <div class="row justify-content-end">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link text-primary"  data-toggle="tooltip" title="Deconnexion"    href="admin.php?page=deconnexion"><i class="fas fa-sign-out-alt mr-1 "></i>Deconnexion</a>                              
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</nav>
<div style="background-color:#161C27;" id="titre2">
    <div class="container">
        <div class="d-flex justify-content-end mr-5">
        <a href="admin.php?page=dashboard" data-toggle="tooltip" title="tableau de bord">
            <?php  
            if(isset($_GET['page']) && ($_GET['page']=='dashboard' OR $_GET['page']=='publications.dash' OR $_GET['page']=='admins.dash')) {
            ?>
                <i class="fas fa-th-large fa-2x text-danger p-1 pl-2 pr-2 mr-2 bg-white"></i>
            <?php 
            }
            else{
            ?>
                <i class="fas fa-th-large fa-2x text-white p-1 pl-2 pr-2 mr-2 bg-secondary"></i>
            <?php   
            }
            ?>                                     
        </a>                            
        
        <a href="admin.php?page=writte" data-toggle="tooltip" title="rédiger article">
            <?php  
            if(isset($_GET['page']) && $_GET['page']=='writte'){
            ?>
                <i class="fas fa-pencil-alt fa-2x text-danger p-1 pl-2 pr-2 mr-2 bg-white "></i>
            <?php 
            }
            else{
            ?>
                <i class="fas fa-pencil-alt fa-2x text-white p-1 pl-2 pr-2 mr-2 bg-info"></i>
            <?php   
            }
            ?>                                     
        </a>
        
        <a href="admin.php?page=config" data-toggle="tooltip" title="configuration">
            <?php  
            if(isset($_GET['page']) && $_GET['page']=='config'){
            ?>
                <i class="fab fa-whmcs fa-2x text-danger p-1 pl-2 pr-2 mr-2 bg-white "></i>
            <?php 
            }
            else{
            ?>
                <i class="fab fa-whmcs fa-2x text-white p-1 pl-2 pr-2 mr-2" style="background-color:#F7CD71;"></i>
            <?php   
            }
            ?>                                     
        </a>                                             
        </div>
    </div>
</div>





