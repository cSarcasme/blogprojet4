<?php

namespace ced\Blog\projet4;

require_once("model/manager.php");

class loginManager extends Manager{

    public function is_Admin($email,$pseudo){
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT admins.id, admins.name, admins.pseudo, admins.email, admins.password, admins.date, admins.token, admins.role
          FROM admins WHERE  (admins.email = ? OR admins.pseudo = ?  ) ');
        $req->execute(array($email,$pseudo));
        $result=$req->fetch();
        
        return $result;    
    }
}