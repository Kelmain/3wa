<?php

/**
 * Created by PhpStorm.
 * User: wap6
 * Date: 29/03/17
 * Time: 11:42
 */
class Engine
{
private $iCylender = 2;
private $sEnergie = 'fuel';



    /**
     * @param mixed $iCylender
     */
    public function setICylender($iCylender)
    {
        $this->iCylender = $iCylender;
    }

    /**
     * @param mixed $sEnergie
     */
    public function setSEnergie($sEnergie)
    {
        $this->sEnergie = $sEnergie;
    }

}