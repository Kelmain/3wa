<?php

include 'inc/connexionDB.php';

$requete = $db ->prepare('SELECT orderNumber, orderDate, shippedDate, status from orders');
$requete->execute();
$donnees = $requete->fetchAll(PDO::FETCH_ASSOC);

//$donnees = $stmt->run('SELECT orderNumber, orderDate, shippedDate, status from orders')->fetchALL();


/*$stmt = DB::run("SELECT orderNumber, orderDate, shippedDate, status from orders");
$donnees = $stmt->fetchAll(PDO::FETCH_ASSOC);
*/


