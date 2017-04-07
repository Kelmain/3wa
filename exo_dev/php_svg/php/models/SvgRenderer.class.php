<?php
class SvgRenderer
{
private $aResults = array();
private $aShapes = array();

    public function test (array $aExemple){

    }
    public function addshape(Shape $shape) {
        array_push($this->aShapes, $shape);
    }
    public function run (){
        foreach ($this->aShapes as $shape){
            $shape->draw($this);
        }
}
public function drawRectangle(Point $location,$color,$opacity,$width,$height){

        $x = $location->getX();
        $y = $location->getY();
        array_push
    (
        $this->aResults,
        "<rect x='$x' y='$y' width='$width' height='$height' fill='$color' opacity='$opacity' />"
    );

}
    public function drawTriangle($points,$color,$opacity){

        $x1 = $points[0]->getX();
        $y1 = $points[0]->getY();

        $x2 = $points[1]->getX();
        $y2 = $points[1]->getY();

        $x3 = $points[2]->getX();
        $y3 = $points[2]->getY();
        array_push
        (
            $this->aResults,

             "<polygon points='$x1 $y1 ,$x2 $y2 ,$x3 $y3' fill='$color' opacity='$opacity'/>"
        );

    }
    public function drawEllipse(Point $location,$color,$opacity,$xRadius,$yRadius){

        $x = $location->getX();
        $y = $location->getY();
        array_push
        (
            $this->aResults,

            "<ellipse cx='$x' cy='$y' rx='$xRadius' ry='$yRadius' fill='$color' opacity='$opacity' />"
        );

    }
    public function drawCircle(Point $location,$color,$opacity,$xRadius){

        $x = $location->getX();
        $y = $location->getY();
        array_push
        (
            $this->aResults,

            "<circle cx='$x' cy='$y' r='$xRadius'  fill='$color' opacity='$opacity' />"
        );

    }

    public function getResult()
    {

        $svgContainer  = '<svg height="600px" width="800px">';
        $svgContainer .= implode($this->aResults);
        $svgContainer .= '</svg>';

        return $svgContainer;
    }


}