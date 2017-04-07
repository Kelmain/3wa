<?php

spl_autoload_register(function ($class) {
    include 'php/models/' . $class . '.class.php';
});


/*spl_autoload_register(function ($class) {

    if (file_exists('php/models/' . $class . '.class.php') ) {
        require 'php/models/' . $class . '.class.php';
    }
    elseif (file_exists('php/controllers/' . $class . '.class.php') ) {
        require 'php/controllers/' . $class . '.class.php';
    } else {
        require 'app/' . $class . '.class.php';
    }
});*/
$oRenderer = new SvgRenderer();
$programm = new Programm();
$programm->run($oRenderer);


//var_dump($_POST);
include 'views/layout.html';