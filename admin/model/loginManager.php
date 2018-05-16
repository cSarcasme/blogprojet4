<?php

namespace ced\Blog\projet4;

require_once("model/manager.php");

class loginManager extends Manager{

    public function isAdmin($email,$pseudo,$password){
        $db = $this->dbConnect();
        //$isPasswordCorrect=false;
        $req = $db->prepare('SELECT admins.id, admins.name, admins.pseudo, admins.email, admins.password, admins.date, admins.token, admins.role
          FROM admins WHERE admins.password=? ');
        $req->execute(array($password));
        $result=$req->fetch();
        
        return $result;
        /*
        if($result){
            $isPasswordCorrect = password_verify($password, $result['password']);
            $_SESSION['id'] = $result['id'];
            $_SESSION['pseudo'] or $_SESSION['email']  = $email or $pseudo;
            
            return  $isPasswordCorrect;
        }
        */
        
    }
}