<?php
class Database{
    public static function connect(){
        $db = new mysqli('localhost','root','miston96','timbox');
        $db->query("SET NAMES 'utf8'");
        return $db;
    }
}