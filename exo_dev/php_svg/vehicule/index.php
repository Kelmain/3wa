<?php

require 'php/models/vehicule.class.php';
require 'php/models/engine.class.php';

//$oEngine = new Engine (4,'fuel');
//$oMoto =  new Vehicule('red',2);
$oVoiture = new Vehicule('black',4);
$oVoiture->oEngine->setICylender(4);

/*var_dump($oVoiture);
if (isset($_GET['color']))
{
    $oVoiture->setSColor($_GET['color']);
}
else {
    $oVoiture->setSColor('rouge');
}*/
var_dump($oVoiture);
//var_dump($oEngine);

//var_dump($oVoiture->getSColor());