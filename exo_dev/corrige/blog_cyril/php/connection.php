<?php

/* Connexion à une base ODBC avec l'invocation de pilote */
$dsn = 'mysql:dbname=blog;host=127.0.0.1';
$user = 'root';
$password = 'troiswa';


try {
    $pdo = new PDO($dsn, $user, $password);
} catch (PDOException $e) {
    echo 'Connexion échouée : ' . $e->getMessage();
}