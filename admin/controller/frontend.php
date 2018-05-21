<?php

require_once('model/loginManager.php');
require_once('model/dashboardManager.php');
require_once('model/writteManager.php');
require_once('model/postAdminManager.php');

function login(){
    /*login*/
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

    /*comments*/
    $countComments = $dashboardManager->tableCountComments();
    $countCommentsSeen = $dashboardManager->tableCountCommentsSeen();
    $countCommentsSeenSignal = $dashboardManager->tableCountCommentsSeenSignal();
    $nbPages = $dashboardManager -> nbPagesBoardComments();
    if(isset($_GET['p']) && $_GET['p']>0 && $_GET['p']<=$nbPages ){
        $cPage=$_GET['p'];
    }
    else{
        $cPage=1;
    }
    $comments = $dashboardManager -> getComments($cPage);

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
   
    require('view/frontend/dashboard.php');
}

function publications(){
    $dashboardManager = new ced\Blog\projet4\dashboardManager();

    /*admins*/
    $countAdmins = $dashboardManager->tableCountAdmins();

    /*comment*/
    $countComments = $dashboardManager->tableCountComments();
    /*posts*/
    $countPosts = $dashboardManager->tableCountPosts();
    $countPostsPublish = $dashboardManager->tableCountPostsPublish();
    $countPostsNoPublish = $dashboardManager->tableCountPostsNoPublish();
    $nbPages = $dashboardManager -> nbPagesBoardPosts();
    if(isset($_GET['p']) && $_GET['p']>0 && $_GET['p']<=$nbPages ){
        $cPage=$_GET['p'];
    }
    else{
        $cPage=1;
    }
    $posts = $dashboardManager -> getPosts($cPage);

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
    
    require('view/frontend/publications.dash.php');
}

function admins(){
    $dashboardManager = new ced\Blog\projet4\dashboardManager();

    /*admins*/
    $countAdmins = $dashboardManager->tableCountAdmins();

    /*comment*/
    $countComments = $dashboardManager->tableCountComments();
    /*posts*/
    $countPosts = $dashboardManager->tableCountPosts();
    
    require('view/frontend/admins.dash.php');

}
function adminPost(){
    $postAdmin=new ced\Blog\projet4\postAdminManager();
    $post = $postAdmin->getPosts($_GET['id']);

 

    require('view/frontend/adminpost.php');
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