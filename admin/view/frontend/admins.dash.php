<?php $title = "Tableau de bord";
 ob_start();
?>

<session>
    <div class="container">
        <?php include('body/dashboard.php')?>
        <div class="col-12">
            <h2 class="mt-4">Récapitulatif d' administration</h2>
        </div>
        <div class="container mt-3"> 
            <div class="d-flex mb-3 ">
                <div class="mr-auto">Retrouvez tous vos administrateurs</div>
            </div>
        </div>
        <table class="table">
            <thead class="thead-dark">
            <tr>
                <th>Nom</th>
                <th>Pseudo</th>
                <th>Email</th>
                <th>Role</th>
            </tr>
            </thead>
            <tbody>
                <?php 
                    foreach($datas as $data){                             
                ?>
                <tr>
                    <td><?=$data['name']?></td>
                    <td><?= $data['pseudo']?></td>
                    <td><?= $data['email']?></td>
                    <td>Administrateur</td>
                </tr>
                <?php
                    }
                ?>
            </tbody>
        </table>
    </div>
</session>


<?php $content = ob_get_clean(); ?>

<?php require('view/frontend/template.php'); ?>