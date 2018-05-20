<?php

namespace ced\Blog\projet4;

class Manager
{
    protected function dbConnect()
    {
        $db = new \PDO('mysql:host=localhost;dbname=blogprojet4.2;charset=utf8', 'root', '',
        array (\PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''));
        return $db;
    }
}