<?php
//SINGLETON
namespace app\config;

define('DATABASENAME','anfelle');
// define('HOST','localhost:3306');
define('HOST','localhost');
define('USER','root');
define('PASS','your_password');

class Conn{

     private static $conn;

     public static function getInstance(){
          if(!isset(self::$conn)){
               self::$conn = new \PDO('mysql:dbname='.DATABASENAME.';host='. HOST,USER);
          }
          return self::$conn;
     }

   
 

}