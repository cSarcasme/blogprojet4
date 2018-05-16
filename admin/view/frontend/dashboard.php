<?php $title = "Dashboard";
 ob_start();
?>
<!--<pre>
<?php// var_dump($_SESSION) ?>
</pre>-->

<h1 class="text-center mt-4">TABLEAU DE BORD</h1>
<div class="container">
    <div class="row mt-4">
        <div class="col-sm-4">
            <div class="card bg-secondary">
                <div class="card-header"></div>
                <div class="card-body">
                    <h5 class="card-title text-center">Publications</h5>
                    <p class="card-text cardDashboard"><?= $countPosts['idPosts'] ?></p>
                </div>
            </div>
        </div>

        <div class="col-sm-4">
            <div class="card bg-info">
                <div class="card-header"></div>
                <div class="card-body">
                    <h5 class="card-title text-center">Commentaires</h5>
                    <p class="card-text cardDashboard"><?= $countComments['idComments'] ?></p>
                </div>
            </div>
        </div>

        <div class="col-sm-4">
            <div class="card" style="background-color:#F7CD71;">
                <div class="card-header"></div>
                <div class="card-body">
                    <h5 class="card-title text-center ">Administrateurs</h5>
                    <p class="card-text cardDashboard"><?= $countAdmins['idAdmins'] ?></p>
                </div>
            </div>
        </div>
    </div>
    <h2 class="mt-4">Commentaires nons  lus</h2>
  <p>Retrouvez tous vox nouveaux commentaires .</p>
    <table class="table">
    <thead class="thead-dark">
      <tr>
        <th>Chapitres</th>
        <th>Commentaires</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td></td>
        <td></td>
        <td></td>
      </tr>
    </tbody>
  </table>
</div>

<?php $content = ob_get_clean(); ?>

<?php require('view/frontend/template.php'); ?>