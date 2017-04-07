<?php
spl_autoload_register(function ($class) {
    include 'php/models/' . $class . '.class.php';
});
$oRenderer = new SvgRenderer();
if (sizeof($_POST) > 0) {

    switch ($_POST['shape']) {
        case 'Rectangle' :
            $obj = new Rectangle();
            $obj->setiSize(200, 100);
            $obj->setOLocation(50, 20);
            break;

        case 'Square' :
            $obj = new Square();
            $obj->setiSize(20);
            $obj->setOLocation(50, 30);
            break;

        case 'Triangle' :
            $obj = new Triangle();
            $obj->setCoordinats(200, 10, 250, 190, 160, 210);
            break;

        case 'Ellipse' :
            $obj = new Ellipse();

            $obj->setOLocation(260, 260);
            $obj->setRadius(100, 25);
            break;

        case 'Circle' :
            $obj = new Circle();
            $obj->setOLocation(300, 170);
            $obj->setRadius(50, 0);
            break;

    }
    if (isset($obj)) {
        $obj->setSColor($_POST['color']);
        $obj->setIOpacity($_POST['opacity']);

        $oRenderer->addShape($obj);                // On ajoute la forme demandee
        $oRenderer->run();
    }
}
include 'views/layout.html';