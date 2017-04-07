<?php
// Si on a bien reçu l'id du post et si le post existe
if (isset($_GET['id']) && postExists($pdo, [':id' => $_GET['id']]))
{
	// Si le formulaire est soumis
	if (sizeof($_POST) > 0) 
	{
		// preparation du tableau attendu par PDO
		$aParams = array(
			':titre' 	=> $_POST['title'],
			':contenu' 	=> $_POST['content'],
			':author' 	=> $_POST['user'],
			':categ' 	=> $_POST['categ'],
			':id'		=> $_GET['id']
		);

		// Mis à jours du post (article)
		updatePost($pdo, $aParams);
	}

	// Récupération du post
	$aInfosPost = getPost($pdo, [':id' => $_GET['id']]);
	// Récupération de la liste des categories
	$aList = getListCategories($pdo);
	// Récupération de la liste des utilisateurs
	$aListUser = getListUsers($pdo);

	// chargement de la vue
	include 'php/user/edit_post.phtml';
} 
// sinon erreur 404
else 
{
	// chargement de la vue
	include 'php/user/error_404.phtml';
}