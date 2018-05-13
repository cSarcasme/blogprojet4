<?php

require_once('model/blogManager.php');

function get_posts(){
    $blogManager=new ced\Blog\projet4\blogManager();
    $posts = $blogManager->getPosts();

   return $posts;
}