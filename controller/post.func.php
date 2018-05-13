<?php

require_once('model/postManager.php');
require_once('model/commentManager.php');

function get_post(){
    $postManager=new ced\Blog\projet4\postManager();
    $post = $postManager->getPosts($_GET['id']);

   return $post;
}

function post_comment($name, $email, $comment){
    $commentManager=new ced\Blog\projet4\commentManager();
    $comment = $commentManager->postComment($_GET['id'],$_POST['name'],$_POST['name'],$_POST['email'],$_POST['comment']);
    return $comment;
}