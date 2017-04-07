<?php
class Circle extends Ellipse
{


    public function setRadius($xRadius,$yRadius=0){
        $this->xRadius=$xRadius;
        $this->yRadius=$xRadius;
    }
    public function draw(SvgRenderer $renderer)
    {

        $renderer->drawCircle(
            $this->oLocation,
            $this->sColor,
            $this->iOpacity,
            $this->xRadius

        );
    }

}