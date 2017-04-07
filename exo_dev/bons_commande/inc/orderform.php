<?php
//var_dump ($_GET);
include 'connexionDB.php';

$requete = $db ->prepare('SELECT * from orderdetails WHERE orderNumber=:orderNumber');
$requete->execute(array('orderNumber' => $_GET['orderNumber']));
$aorderDetails = $requete->fetchAll(PDO::FETCH_ASSOC);

var_dump($aorderDetails);