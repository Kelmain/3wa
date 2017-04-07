<?php
class Triangle extends Shape
{
private $points;



    /**
     * Triangle constructor.

     */
    public function __construct()
    {
        parent::__construct();
        $this->points = [new Point(), new Point(), new Point()];
    }


    /**
     * @param array $points
     */
    public function setCoordinats($x1,$y1,$x2,$y2,$x3,$y3)
    {
        $this->points[0]->moveTo($x1,$y1);
        $this->points[1]->moveTo($x2,$y2);
        $this->points[2]->moveTo($x3,$y3);
    }

    public function draw(SvgRenderer $renderer)
    {

        $renderer->drawTriangle(
            $this->points,

            $this->sColor,
            $this->iOpacity

        );
    }
}