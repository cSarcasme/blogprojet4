<?php

require_once('model/homeManager.php');
require_once('model/blogManager.php');
require_once('model/postManager.php');
require_once('model/commentManager.php');

function listChaptersHome(){
    $postManager=new ced\Blog\projet4\homeManager();
    $posts = $postManager->getPosts();

   require('view/frontend/home.php');
}

function listChaptersBlog(){
    $blogManager=new ced\Blog\projet4\blogManager();
    $posts = $blogManager->getPosts();

    require('view/frontend/blog.php');
}

function postChapter(){
    $postManager=new ced\Blog\projet4\postManager();
    $post = $postManager->getPosts($_GET['id']);

    $commentManager=new ced\Blog\projet4\commentManager();
    $comments = $commentManager->getComments($_GET['id']);

    if ($post == false) {
        throw new Exception('Ce n\'est pas la bonne page');
    }
    else {
        require('view/frontend/post.php');
    }      
}

function post_comment($postId,$name, $email, $comment){
    $commentManager=new ced\Blog\projet4\commentManager();
    $affectedLines = $commentManager->postComment($postId,$name, $email, $comment);
    
    header('Location:index.php?page=post&id=' . $postId);
}

function update_CommentSeen($postId,$post_id){
    $commentManager=new ced\Blog\projet4\commentManager();
    $updateComment = $commentManager -> updateComment($post_id);    
    header('Location:index.php?page=post&id=' . $postId);
}