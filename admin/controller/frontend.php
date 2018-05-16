<?php

require_once('model/loginManager.php');

function login(){

    $loginManager=new ced\Blog\projet4\loginManager();
    $result = $loginManager->isAdmin($_POST['email'],$_POST['email'],$_POST['password']);

   require('view/frontend/login.php');
}

function dashboard()
{
    header('Location:admin.php?page=dashboard');
}