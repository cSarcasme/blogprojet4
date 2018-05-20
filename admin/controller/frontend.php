<?php

require_once('model/loginManager.php');
require_once('model/dashboardManager.php');
require_once('model/writteManager.php');

function login(){

    class login{
        public function submitLogin($email,$pseudo){
            $loginManager = new ced\Blog\projet4\loginManager(); 
            $result = $loginManager->is_Admin($email,$pseudo);
            return $result;
        }
    }    
   require('view/frontend/login.php');
}

function dashboard(){
    $dashboardManager = new ced\Blog\projet4\dashboardManager();
    $countAdmins = $dashboardManager->tableCountAdmins();
    $countComments = $dashboardManager->tableCountComments();
    $countCommentsSeen = $dashboardManager->tableCountCommentsSeen();
    $countCommentsSeenSignal = $dashboardManager->tableCountCommentsSeenSignal();
    $countPosts = $dashboardManager->tableCountPosts();
    $comments = $dashboardManager -> getComments();

    class deleteUpdateComment{
        public function delete_Comments($postId){
            $dashboardManager = new ced\Blog\projet4\dashboardManager();
            $updateComment = $dashboardManager -> deleteComments($postId);    
        }
        public function update_Comments($postId){
            $dashboardManager = new ced\Blog\projet4\dashboardManager();
            $deleteComment = $dashboardManager -> updateComments($postId);    
        }
    }
    
    require('view/frontend/dashboard.php');
}

function deconnexion(){
    require('view/frontend/deconnexion.php');
}

function writte(){
    require('view/frontend/writte.php');
}

function post_Post($title, $content, $image, $posted){
    $postManager=new ced\Blog\projet4\writteManager();
    $affectedLines = $postManager->postPost($title, $content, $image, $posted);
    
    header('Location:admin.php?page=dashboard');
}

function config(){
    require('view/frontend/config.php');
}