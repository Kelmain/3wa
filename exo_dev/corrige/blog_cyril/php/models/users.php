<?php

/**
 * get All users
 * Retourne la liste de tout les utilistauers
 * @param object connection PDO 
 *
 * @return array data users
 */
function getListUsers($monPdo)
{
	$query = $monPdo->prepare('SELECT * FROM users');
	$query->execute();
	return $query->fetchAll(PDO::FETCH_ASSOC);
}