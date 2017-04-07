<?php
class Programm {

    public function run (SvgRenderer $oRenderer) {

        $oRectangle = new Rectangle();
        $oRectangle->setiSize(200,500);
        $oRectangle->setIOpacity(1);
        $oRectangle->setSColor('#6AE388');
        $oRectangle->setOLocation(200,400);

        $oRectangle2 = new Rectangle();
        $oRectangle2->setiSize(100,50);
        $oRectangle2->setIOpacity(1);
        $oRectangle2->setSColor('red');
        $oRectangle2->setOLocation(300,500);

        $oSquare = new Square();
        $oSquare->setiSize(50,0);
        $oSquare->setIOpacity(1);
        $oSquare->setSColor('#E3DE6A');
        $oSquare->setOLocation(225,500);

        $oSquare2 = new Square();
        $oSquare2->setiSize(50,0);
        $oSquare2->setIOpacity(1);
        $oSquare2->setSColor('#E3DE6A');
        $oSquare2->setOLocation(400,500);

        $oSquare3 = new Square();
        $oSquare3->setiSize(50,0);
        $oSquare3->setIOpacity(1);
        $oSquare3->setSColor('#E3DE6A');
        $oSquare3->setOLocation(500,500);

        $oSquare4 = new Square();
        $oSquare4->setiSize(50,00);
        $oSquare4->setIOpacity(1);
        $oSquare4->setSColor('#E3DE6A');
        $oSquare4->setOLocation(600,500);

        $oDoorknoob = new Square();
        $oDoorknoob->setiSize(7,0);
        $oDoorknoob->setIOpacity(1);
        $oDoorknoob->setSColor('#3479E1');
        $oDoorknoob->setOLocation(300,543);

        $oDach = new Triangle();
        $oDach->setCoordinats(450, 200,700,400,200,400);
        $oDach->setIOpacity(1);
        $oDach->setSColor('#black');

        $oEllipse = new Ellipse();
        $oEllipse->setOLocation(160,160);
        $oEllipse->setIOpacity(1);
        $oEllipse->setSColor('#CED9E9');
        $oEllipse->setRadius(100,25);

        $oCircle = new Circle();
        $oCircle->setOLocation(500,70);
        $oCircle->setIOpacity(1);
        $oCircle->setSColor('#EEE723');
        $oCircle->setRadius(50,0);


        $oRenderer->addshape($oRectangle);
        $oRenderer->addshape($oRectangle2);
        $oRenderer->addshape($oSquare);
        $oRenderer->addshape($oSquare2);
        $oRenderer->addshape($oSquare3);
        $oRenderer->addshape($oSquare4);
        $oRenderer->addshape($oDoorknoob);
        $oRenderer->addshape($oDach);
        $oRenderer->addshape($oEllipse);
        $oRenderer->addshape($oCircle);



        $oRenderer->run();
    }

}