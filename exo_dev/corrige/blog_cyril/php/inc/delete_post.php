<?php

// Si on a bien reçu l'id du post et si le post existe
if (isset($_GET['id']) && postExists($pdo, [':id' => $_GET['id']]))
{
	// suppression du post
	delPost($pdo, [':id' => $_GET['id']]);
}

// redirection à l'accueil
header('location:index.php');