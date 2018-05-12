<?php

require_once('model/postManager.php');

function get_posts(){
    $postManager=new ced\Blog\projet4\PostManager();
    $posts = $postManager->getPosts();

   return $posts;
}