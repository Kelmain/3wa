<?php
	// si il y a eut soumission du formulaire
	if (sizeof($_POST) > 0) 
	{
		// Preparation du tableau attendu par PDO
		$aParams = array(
			':titre' 	=> $_POST['title'],
			':contenu' 	=> $_POST['content'],
			':author' 	=> $_POST['user'],
			':categ' 	=> $_POST['categ']	
		);
		// Ajout du post
		addPost($pdo, $aParams);
	}

	// chargement de la liste des categories
	$aList = getListCategories($pdo);
	// chargement de la liste des utilisateurs
	$aListUser = getListUsers($pdo);

	// chargement de la vue
	include 'php/user/add_post.phtml';
