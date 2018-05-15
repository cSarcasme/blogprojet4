<?php

require_once('model/loginManager.php');

function is_Admin($email,$password){
    $loginManager=new ced\Blog\projet4\loginManager();
    $result = $loginManager->isAdmin($email,$password);

   return $result;
}