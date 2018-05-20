<?php

namespace ced\Blog\projet4;

require_once("model/manager.php");

class writteManager extends Manager{

    public function postPost($title, $content, $image, $posted){
        $db = $this->dbConnect();
        $posts = $db->prepare('INSERT INTO posts(posts.title, posts.content, posts.image, posts.posted, posts.date)
         VALUES(?, ?, ?, ?, NOW())');
        $affectedLines = $posts->execute(array($title, $content, $image, $posted));

        return $affectedLines;
    }
}