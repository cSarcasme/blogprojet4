<?php

namespace ced\Blog\projet4;

class Manager
{
    protected function dbConnect()
    {
        $db = new \PDO('mysql:host=localhost;dbname=blogprojet4;charset=utf8', 'root', '');
        return $db;
    }
}