<?php

class Vehicule {

    private $sColor;
    private $iRoues = 4;
    public $oEngine;
    private $iSparewheel = 1;
    private $iFlattire;



    /**
     * Vehicule constructor.
     * @param $sColor
     * @param $iNbRoues
     */
    public function __construct($sColor,$iNbRoues)
    {
        $this->sColor = $sColor;
        $this->iRoues = $iNbRoues;
        $this->oEngine = new Engine();


    }


    /**
     * @return mixed
     */
    public function getSColor()
    {
        return $this->sColor;
    }

    /**
     * @param mixed $sColor
     */
    public function setSColor($sColor)
    {
        $this->sColor = $sColor;
    }

    /**
     * @return mixed
     */
    public function getIRoues()
    {
        return $this->iRoues;
    }

    /**
     * @param mixed $iRoues
     */
    public function setIRoues($iRoues)
    {
        $this->iRoues = $iRoues;
    }

    /**
     * @return mixed
     */
    public function getISparewheel()
    {
        return $this->iSparewheel;
    }

    /**
     * @param mixed $iSparewheel
     */
    public function setISparewheel($iSparewheel)
    {
        $this->iSparewheel = $iSparewheel;
    }

    /**
     * @return mixed
     */
    public function getIFlattire()
    {
        return $this->iFlattire;
    }

    /**
     * @param mixed $iFlattire
     */
    public function setIFlattire($iFlattire)
    {
        $this->iFlattire = $iFlattire;
    }
   public function flattired (){
        $this->iRoues--;
   }

    public function sparetire()
    {
        // Si changement utile
        if ($this->iRoues == 3)
        {
            // Si il reste des roues de secours
            if ($this->iSparewheel > 0)
            {
                // on retire une roue de secours
                $this->iSparewheel--;
                // on ajoute une roue (la roue secour)
                $this->iRoues++;
            }
            else
            {
                return 'Plus de roues de secours';
            }
        }
        else
        {
            return 'Inutile de changer la roue';
        }
    }
}