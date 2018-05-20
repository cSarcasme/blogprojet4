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

    /*admins*/
    $countAdmins = $dashboardManager->tableCountAdmins();

    /*comment*/
    $countComments = $dashboardManager->tableCountComments();
    $countCommentsSeen = $dashboardManager->tableCountCommentsSeen();
    $countCommentsSeenSignal = $dashboardManager->tableCountCommentsSeenSignal();
    $comments = $dashboardManager -> getComments();

    class deleteUpdateComment{
        public function delete_Comments($postId){
            $dashboardManager = new ced\Blog\projet4\dashboardManager();
            $deleteComments = $dashboardManager -> deleteComments($postId);    
        }
        public function update_Comments($postId){
            $dashboardManager = new ced\Blog\projet4\dashboardManager();
            $updateComments = $dashboardManager -> updateComments($postId);    
        }
    }

    /*posts*/
    $countPosts = $dashboardManager->tableCountPosts();
    $countPostsPublish = $dashboardManager->tableCountPostsPublish();
    $countPostsNoPublish = $dashboardManager->tableCountPostsNoPublish();
    $posts = $dashboardManager -> getPosts();

    class deleteUpdatePublishPost{
        public function delete_Post($postId){
            $dashboardManager = new ced\Blog\projet4\dashboardManager();
            $deletepost = $dashboardManager -> deletePost($postId);    
        }
        public function update_PostsPublish($postId){
            $dashboardManager = new ced\Blog\projet4\dashboardManager();
            $updatePostPublish = $dashboardManager -> updatePostsPublish($postId);    
        }
        public function update_PostsNoPublish($postId){
            $dashboardManager = new ced\Blog\projet4\dashboardManager();
            $updatePostNoPublish = $dashboardManager -> updatePostsNoPublish($postId);    
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

function post_Post($title, $content,$writer, $image, $posted){
    $postManager=new ced\Blog\projet4\writteManager();
    $affectedLines = $postManager->postPost($title, $content,$writer, $image, $posted);
    
    header('Location:admin.php?page=dashboard');
}

function config(){
    require('view/frontend/config.php');
}