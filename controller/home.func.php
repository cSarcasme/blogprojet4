<?php

require_once('model/homeManager.php');

function get_posts(){
    $postManager=new ced\Blog\projet4\homeManager();
    $posts = $postManager->getPosts();

   return $posts;
}