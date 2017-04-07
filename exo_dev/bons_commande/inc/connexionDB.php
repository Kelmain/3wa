<?php
/**
 * Created by PhpStorm.
 * User: wap6
 * Date: 13/03/17
 * Time: 16:37
 */
$dsn = 'mysql:host=localhost;dbname=classicmodels';
$username = 'root';
$passwd = 'troiswa';

try {
    $db = new PDO('mysql:host=localhost;dbname=classicmodels', $username, $passwd, array(
    PDO::ATTR_PERSISTENT => true));
    
   
}
catch(PDOException $e)
{

        die('Erreur : '.$e->getMessage());
}



/*class MyPDO extends PDO
{
    public function __construct($dsn, $username = NULL, $passwd = NULL, $options = [])
    {
        $default_options = [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        ];
        $options = array_merge($default_options, $options);
        parent::__construct($dsn, $username, $passwd, $options);
    }
public function  run($sql, $args = NULL)
{
    $stmt = $this->prepare($sql);
    $stmt->execute($args);
    return $stmt;
}
}*/

/*define('DB_HOST', 'localhost');
define('DB_NAME', 'classicmodels');
define('DB_USER', 'root');
define('DB_PASS', 'troiswa');
define('DB_CHAR', 'utf8');

class DB
{
    protected static $instance = null;

    protected function __construct() {}
    protected function __clone() {}

    public static function instance()
    {
        if (self::$instance === null)
        {
            $opt  = array(
                PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES   => FALSE,
            );
            $dsn = 'mysql:host='.DB_HOST.';dbname='.DB_NAME.';charset='.DB_CHAR;
            self::$instance = new PDO($dsn, DB_USER, DB_PASS, $opt);
        }
        return self::$instance;
    }

    public static function __callStatic($method, $args)
    {
        return call_user_func_array(array(self::instance(), $method), $args);
    }

    public static function run($sql, $args = [])
    {
        $stmt = self::instance()->prepare($sql);
        $stmt->execute($args);
        return $stmt;
    }
}*/