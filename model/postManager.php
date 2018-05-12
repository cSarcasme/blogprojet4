<?php

namespace ced\Blog\projet4;

require_once("model/manager.php");

class PostManager extends Manager{
    public function getPosts(){
        $db=$this->dbConnect();
        $req = $db->query("SELECT posts.id,posts.title,posts.image,posts.date,posts.content,admins.name FROM posts JOIN admins
         ON posts.writer=admins.email WHERE posted='1' ORDER BY posts.date DESC LIMIT 0,2 ");

        /*$results = array();*/

       /* while($rows = $req->fetch()){
            $results[] = $rows;

        }*/
        return $req;
    }
}