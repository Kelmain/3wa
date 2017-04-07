<?php

/**
 * get All categories
 * Retourne la liste de toutes les categories
 * @param object connection PDO 
 *
 * @return array data categories
 */
function getListCategories($monPdo)
{
	$query = $monPdo->prepare('SELECT * FROM categories');
	$query->execute();
	return $query->fetchAll(PDO::FETCH_ASSOC);
}
