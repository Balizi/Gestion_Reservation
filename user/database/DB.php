<?php
    class DB
    {
        public static function Connect()
        {
            $db=new PDO('mysql:dbname=reservation;host=localhost','root','');
            $db->exec("set names utf8");
            $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_WARNING);
            return $db;
        }
    }
?>