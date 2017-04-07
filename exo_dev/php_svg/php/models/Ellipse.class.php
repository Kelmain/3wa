<?php


class Ellipse extends Shape
{

    protected $xRadius;
    protected $yRadius;

    /**
     * Eclipse constructor.

     */
    public function __construct()
    {
         parent::__construct();
        $this->xRadius = 0;
        $this->yRadius = 0;
    }

public function setRadius($xRadius,$yRadius){
        $this->xRadius=$xRadius;
        $this->yRadius=$yRadius;
}
    public function draw(SvgRenderer $renderer)
    {

        $renderer->drawEllipse(
            $this->oLocation,
            $this->sColor,
            $this->iOpacity,
            $this->xRadius,
            $this->yRadius
        );
    }
}