<?php

require_once('model/postManager.php');
require_once('model/commentManager.php');

function get_post(){
    $postManager=new ced\Blog\projet4\postManager();
    $post = $postManager->getPosts($_GET['id']);

   return $post;
}

function post_comment($postId,$name, $email, $comment){
    $commentManager=new ced\Blog\projet4\commentManager();
    $affectedLines = $commentManager->postComment($postId,$name, $email, $comment);
    
    header('Location:index.php?page=post&id=' . $postId);
}

function get_comments(){
    $commentManager=new ced\Blog\projet4\commentManager();
    $comments = $commentManager->getComments($_GET['id']);
    return $comments;
}