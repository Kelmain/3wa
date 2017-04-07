<?php


function my_autoloader($class) {
include 'models/' . $class . '.class.php';
}

spl_autoload_register('my_autoloader');

// Ou, en utilisant une fonction anonyme à partir de PHP 5.3.0
spl_autoload_register(function ($class) {
include 'classes/' . $class . '.class.php';
});
