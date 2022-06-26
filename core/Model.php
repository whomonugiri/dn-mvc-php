<?php
namespace Core;
use App\Config;
abstract class Model
{
    static $db = null;

    protected static function DB()
    {
        if(self::$db==null){
            $host=Config::DB_HOST;
            $dbname=Config::DB_NAME;
            $username=Config::DB_USER;
            $password=Config::DB_PASS;

            try{
                $db = new \mysqli($host,$username,$password,$dbname);
            }catch(Exception $e){
                echo $e->getMessage();
            }
           

        }
        return $db;
    }
}