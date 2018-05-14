<?php

namespace ced\Blog\projet4;

require_once("model/manager.php");

class commentManager extends Manager{

    public function postComment($postId, $name, $email, $comment){
        $db = $this->dbConnect();
        $comments = $db->prepare('INSERT INTO comments(comments.post_id, comments.name, comments.email, comments.comment, comments.date)
         VALUES(?, ?, ?, ?, NOW())');
        $affectedLines = $comments->execute(array($postId, $name, $email, $comment));

        return $affectedLines;
    }

    public function getComments($postId){
        $db = $this->dbConnect();
        $comments=$db->prepare("SELECT comments.id, comments.name, comments.email, comments.comment FROM comments 
        WHERE comments.post_id=? ORDER BY comments.date DESC LIMIT 0,10");  
        
        $comments->execute(array($postId));

        return $comments;
    }
}