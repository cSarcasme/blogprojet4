<?php

namespace ced\Blog\projet4;

require_once("model/manager.php");

class loginManager extends Manager{

    public function isAdmin($email,$password){
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT admins.id, admins.name, admins.email, admins.password, admins.date, admins.token, admins.role
          FROM admins WHERE admins.email=? AND admins.password=? ');
        $req->execute(array($email, $password));
        $result=$req->fetch();
        return $result;
    }
}