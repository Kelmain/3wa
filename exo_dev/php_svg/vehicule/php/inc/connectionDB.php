<?php
/**
 * Created by PhpStorm.
 * User: Armin
 * Date: 05/03/2017
 * Time: 12:54
 */

try {

    $db = new PDO ('mysql:host=localhost;dbname=test;charset=utf8', 'root', '');
    //array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}
catch (Exception $e){
    die('Error : '. $e ->getMessage());
}


