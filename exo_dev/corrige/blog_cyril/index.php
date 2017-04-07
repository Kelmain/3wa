<?php

// Chargement de notre connexion à la BDD
require 'php/connection.php';

// On charge tout nos models
// (ce n'est pas une bonne pratique mais 
// pour nos débuts c'est très bien ;-))
require 'php/models/categories.php';
require 'php/models/users.php';
require 'php/models/posts.php';


// Si on reçoit page dans la query_string (chaine de requete)
if (isset($_GET['page']))
{
	// en fonction de la page demandé ...
	switch($_GET['page'])
	{
		case 'add_post' :	
		case 'delete_post' :
		case 'edit_post' :
			// .. on charge son controller 
			require 'php/inc/'.$_GET['page'].'.php';
		break;

		default :
			// chargement du controller page erreur 404
			require 'php/inc/error_404.php';
	}
} 
// Sinon c'est la page d'accueil
else 
{
	// chargement du controller (page d'accueil)
	require 'php/inc/home.php';
}

