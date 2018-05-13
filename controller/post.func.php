<?php

require_once('model/postManager.php');

function get_post(){
    $postManager=new ced\Blog\projet4\postManager();
    $post = $postManager->getPosts($_GET['id']);

   return $post;
}