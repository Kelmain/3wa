<?php
include 'inc/utilities.php';
header('Content-Type: text/html; charset=utf-8');
$aTasks = loadTasks();
//var_dump($aTasks);

include 'views/layout.phtml';
