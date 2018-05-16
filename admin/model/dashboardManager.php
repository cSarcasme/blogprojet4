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

        public function tableCounComments(){
            $db = $this->dbConnect();
            $req =$db->query('SELECT COUNT(id)as idComments FROM comments');
            $nbr = $req -> fetch();
            return $nbr;
        }

        public function tableCountPosts(){
            $db = $this-> dbConnect();
            $req =$db->query('SELECT COUNT(id)as idPosts FROM posts');
            $nbr = $req -> fetch();
            return $nbr;
        }
    }