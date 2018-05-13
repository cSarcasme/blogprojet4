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
}