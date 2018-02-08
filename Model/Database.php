<?php

class Database
{
    private $dbcon;

    public function Connect(){

        DEFINE ('DB_USER', 'root');
        DEFINE ('DB_PSWD', '');
        DEFINE ('DB_HOST', 'localhost');
        DEFINE ('DB_NAME', 'proje');

        try
        {
            $dbcon = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME."; charset=utf8", DB_USER, DB_PSWD);
        }

        catch ( PDOException $e )
        {
            return "DBFalse";
        }

        return $dbcon;

    }

    public function Close(){
        $dbcon = null;
    }
}