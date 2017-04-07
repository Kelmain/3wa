<?php
class Point {

    private $x = 0;
    private $y = 0;

    /**
     * @return mixed
     */
    public function getX()
    {
        return $this->x;
    }

    /**
     * @return mixed
     */
    public function getY()
    {
        return $this->y;
    }

    /**
     * @param $x
     * @param $y
     */
    public function move($x, $y){
        $this->x += $x;
        $this->y += $y;


    }

    /**
     * @param $x
     * @param $y
     */
    public function moveTo($x, $y){
        $this->x = $x;
        $this->y = $y;

    }


}