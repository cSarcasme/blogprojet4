<?php

namespace ced\Blog\projet4;

require_once("model/manager.php");

   

    class dashboardManager extends Manager{
        public function tableCountAdmins(){
            $db = $this -> dbConnect();
            $req =$db->query('SELECT COUNT(id)as idAdmins FROM admins');
            $nbr = $req -> fetch();
            return $nbr;
        }

        public function tableCountComments(){
            $db = $this->dbConnect();
            $req =$db->query('SELECT COUNT(id)as idComments FROM comments');
            $nbr = $req -> fetch();
            return $nbr;
        }

        public function tableCountCommentsSeen(){
            $db = $this->dbConnect();
            $req =$db->query('SELECT COUNT(id)as idComments FROM comments WHERE comments.seen="0"');
            $nbr = $req -> fetch();
            return $nbr;
        }

        public function tableCountCommentsSeenSignal(){
            $db = $this->dbConnect();
            $req =$db->query('SELECT COUNT(id)as idComments FROM comments WHERE comments.seen="2"');
            $nbr = $req -> fetch();
            return $nbr;
        }

        public function tableCountPosts(){
            $db = $this-> dbConnect();
            $req =$db->query('SELECT COUNT(id)as idPosts FROM posts');
            $nbr = $req -> fetch();
            return $nbr;
        }
        
        public function getComments(){
            $db = $this-> dbConnect();
            $req =$db->query('SELECT comments.id, comments.name, comments.email, comments.comment, comments.post_id, comments.date, comments.seen, posts.title 
            FROM comments JOIN posts ON comments.post_id = posts.id WHERE comments.seen="0" OR comments.seen="2"  ORDER BY comments.date DESC ');
            
            return $req;
        }

        public function deleteComments($postId){
            $db = $this-> dbConnect();
            $req =$db->prepare('DELETE  FROM comments WHERE comments.id=?');
            $req->execute(array($postId));
            
            return $req;
        }

        public function updateComments($postId){
            $db = $this-> dbConnect();
            $req =$db->prepare('UPDATE   comments SET comments.seen = "1" WHERE comments.id=?');
            $req->execute(array($postId));
            
            return $req;
        }
    }