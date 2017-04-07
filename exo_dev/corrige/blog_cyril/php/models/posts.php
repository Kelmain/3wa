<?php


/**
 * Verifie si le post existe
 * @param object connection PDO 
 * @param array contains [':id' => ID_POST]
 *
 * @return array data post
 */
function postExists($monPdo,$aParams)
{
	$query = $monPdo->prepare('SELECT id FROM posts WHERE id=:id');
	$query->execute($aParams);
	if ($query->rowCount() == 1) return true;
	return false;
}

/**
 * Return data post By ID
 * @param object connection PDO 
 * @param array contains [':id' => ID_POST]
 *
 * @return array data post
 */
function getPost($monPdo,$aParams)
{
	$query = $monPdo->prepare('SELECT * FROM posts WHERE id=:id');
	$query->execute($aParams);
	return $query->fetch(PDO::FETCH_ASSOC);
}

/**
 * get all posts 
 * @param object connection PDO 
 *
 * @return array data posts
 */
function getListPosts($monPdo)
{
	$query = $monPdo->prepare('SELECT posts.*,pseudo,name FROM posts 
		INNER JOIN users ON posts.users_id=users.id
		INNER JOIN categories ON posts.categories_id=categories.id'
	);
	$query->execute();
	return $query->fetchAll(PDO::FETCH_ASSOC);
}

/**
 * Add post
 * @param object connection PDO 
 * @param array contains alla data for register
 */
function addPost($monPdo, $aParams)
{
	$query = $monPdo->prepare(
		'INSERT INTO posts (title,content,users_id,categories_id,date_creation,date_modification) 
		VALUES (:titre,:contenu,:author,:categ, NOW(), NOW())'
	);

	$query->execute($aParams);
}

/**
 * Update post
 * @param object connection PDO 
 * @param array contains alla data for register
 */
function updatePost($monPdo, $aParams)
{
	$query = $monPdo->prepare(
		'UPDATE posts SET title=:titre, 
			content=:contenu, 
			categories_id=:categ, 
			users_id=:author, 
			date_modification=NOW() WHERE id=:id'
	);
	$query->execute($aParams);
}

/**
 * delete post
 * @param object connection PDO 
 * @param array contains [':id' => ID_POST]
 */
function delPost($monPdo, $aParams)
{
	$query = $monPdo->prepare('DELETE FROM posts WHERE id=:id');
	$query->execute($aParams);
}
