<?php

namespace ced\Blog\projet4;

require_once("model/manager.php");

    class dashboardManager extends Manager{
/*part Admins */
        /*count nbr Admins*/
        public function tableCountAdmins(){
            $db = $this -> dbConnect();
            $req =$db->query('SELECT COUNT(id)as idAdmins FROM admins');
            $nbr = $req -> fetch();
            return $nbr;
        }

/*part comments */
        /*count nbr comments total on the website */
        public function tableCountComments(){
            $db = $this->dbConnect();
            $req =$db->query('SELECT COUNT(id)as idComments FROM comments');
            $nbr = $req -> fetch();
            return $nbr;
        }
        /*count nbr comments no valid by admins in tableau de bord*/
        public function tableCountCommentsSeen(){
            $db = $this->dbConnect();
            $req =$db->query('SELECT COUNT(id)as idComments FROM comments WHERE comments.seen="0"');
            $nbr = $req -> fetch();
            return $nbr;
        }
        /*count nbr comments reported by user in tableau de bord*/
        public function tableCountCommentsSeenSignal(){
            $db = $this->dbConnect();
            $req =$db->query('SELECT COUNT(id)as idComments FROM comments WHERE comments.seen="2"');
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

/*part post */
        /*count nbr post  total*/
        public function tableCountPosts(){
            $db = $this-> dbConnect();
            $req =$db->query('SELECT COUNT(id)as idPosts FROM posts');
            $nbr = $req -> fetch();
            return $nbr;
        }
        /*count nbr post publish  total*/
        public function tableCountPostsPublish(){
            $db = $this-> dbConnect();
            $req =$db->query('SELECT COUNT(id)as idPosts FROM posts WHERE posts.posted="1"');
            $nbr = $req -> fetch();
            return $nbr;
        }
        /*count nbr post no publish  total*/
        public function tableCountPostsNoPublish(){
            $db = $this-> dbConnect();
            $req =$db->query('SELECT COUNT(id)as idPosts FROM posts WHERE posts.posted="0"');
            $nbr = $req -> fetch();
            return $nbr;
        }

        public function getPosts(){
            $db = $this-> dbConnect();
            $req =$db->query('SELECT posts.id, posts.title, posts.content, posts.posted, posts.date, admins.name
            FROM posts JOIN admins ON posts.writer = admins.email WHERE posts.posted="0" OR posts.posted="1"  ORDER BY posts.date DESC ');
            
            return $req;
        }

        public function deletePost($postId){
            $db = $this-> dbConnect();
            $req =$db->prepare('DELETE  FROM posts WHERE posts.id=?');
            $req->execute(array($postId));
            
            return $req;
        }

        public function updatePostsPublish($postId){
            $db = $this-> dbConnect();
            $req =$db->prepare('UPDATE   posts SET posts.posted = "1" WHERE posts.id=?');
            $req->execute(array($postId));
            
            return $req;
        }

        public function updatePostsNoPublish($postId){
            $db = $this-> dbConnect();
            $req =$db->prepare('UPDATE   posts SET posts.posted = "0" WHERE posts.id=?');
            $req->execute(array($postId));
            
            return $req;
        }
        

    }