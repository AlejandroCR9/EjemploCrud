<?php
class Database
{
    private static $dbName = 'ejercicio' ;
    private static $dbHost = 'localhost' ;
    private static $dbUsername = 'admin';
    private static $dbUserPassword = '770056391dda2ccecf16b57f70a278120f81e8f74c571e94';
     
    private static $cont  = null;
     
    public function __construct() {
        die('Init function is not allowed');
    }
     
    public static function connect()
    {
       if ( null == self::$cont )
       {     
        try
        {
          self::$cont =  new PDO( "mysql:host=".self::$dbHost.";"."dbname=".self::$dbName, self::$dbUsername, self::$dbUserPassword); 
        }
        catch(PDOException $e)
        {
          die($e->getMessage()); 
        }
       }
       return self::$cont;
    }
     
    public static function disconnect()
    {
        self::$cont = null;
    }
}
?>