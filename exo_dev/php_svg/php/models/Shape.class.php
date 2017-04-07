<?php

abstract class Shape
{
    protected $sColor ;
    protected $iOpacity;
    protected $oLocation ;





    abstract public function draw(SvgRenderer $renderer);
    /**
     * Shape constructor.
     */
    public function __construct()
    {
        $this->sColor  = 'black';
        $this->iOpacity = 1;
        $this->oLocation  = new Point();
    }


    public function setOLocation($x, $y)
    {
        $this->oLocation->moveTo($x,$y);


    }
    /**
     * @param mixed $sColor
     */
    public function setSColor($sColor)
    {
        $this->sColor = $sColor;
    }
    /**
     * @param mixed $iOpacity
     */
    public function setIOpacity($iOpacity)
    {
        $this->iOpacity = $iOpacity;
    }





}