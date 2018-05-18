<?php

require_once('model/loginManager.php');
require_once('model/dashboardManager.php');

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