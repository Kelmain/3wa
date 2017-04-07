<?php
class Rectangle extends Shape
{
protected $iheight;
protected $iwidth;

    /**
     * Rectangle constructor.

     */
    public function __construct()
    {
        parent::__construct();
        $this->iheight = 100;
        $this->iwidth = 100;
    }


    /**
     * @param $iheight
     * @param $iwidth
     */
    public function setiSize($iheight, $iwidth){
        $this->iwidth = $iwidth;
        $this->iheight = $iheight;
    }

public function draw(SvgRenderer $renderer)
{

    $renderer->drawRectangle(
        $this->oLocation,
        $this->sColor,
        $this->iOpacity,
        $this->iwidth,
        $this->iheight
    );
}


}