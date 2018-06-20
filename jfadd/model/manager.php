<?php
/*connexion bbd for part admin*/
namespace ced\Blog\projet4;

class Manager
{
    protected function dbConnect(){
        
        
        $db = new \PDO('mysql:host=mysql086.sql004:3306;dbname=oftstrasnh92;charset=utf8', 'oftstrasnh92', 'Ug3vFtg97DKv',
        array (\PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''));
        return $db;
    }
}