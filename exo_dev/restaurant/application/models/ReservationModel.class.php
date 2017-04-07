<?php
class ReservationModel
{

    private $aDataPost = [
        'BookingDate'=> '',
        'BookingTime' => '',
        'NumberOfSeats' => '',
        'User_Id' => ''


    ];


    public function Booking($id, array $values)
    {
var_dump($values);
var_dump($id);
        $sql = 'INSERT INTO Booking (BookingDate, BookingTime, NumberOfSeats, User_Id,  CreationTimestamp) 
               VALUES (:BookingDate,
                       :BookingTime,
                       :NumberOfSeats,
                       :User_Id,
                       NOW()
                       )';



        foreach ($this->aDataPost as $sIndex => $sName) {

            // Si on a recu en post
            if($sIndex == 'User_Id') {
                $this->aDataPost[$sIndex] = $id;
            }
            elseif (array_key_exists($sIndex, $values)) {

                // On recupere la valeur de POST
                $this->aDataPost[$sIndex] = $values[$sIndex];
                // Control
                $sControl = 'control' . $sIndex;
                if (method_exists($this, $sControl)) {
                    $this->$sControl($this->aDataPost[$sIndex]);
                }
                // Gestion d'un setter permettant de modifier une valeur
                $sSetter = 'set' . $sIndex;
                if (method_exists($this, $sSetter)) {
                    $this->aDataPost[$sIndex] = $this->$sSetter($this->aDataPost[$sIndex]);
                }
            }
            else {
                // Si on a pas recu le champ on supprime
                $this->aDataPost[$sIndex] = '';
            }

        }




var_dump($this->aDataPost);
        $db = new Database();
        return $db->executeSql($sql, $this->aDataPost);
        // var_dump($this->aDataPost);

    }





    /**
     * Control de l'email
     */


    private function controlEmail($sData)
    {


        if (!filter_var($sData, FILTER_VALIDATE_EMAIL)) {
            throw new DomainException('it\'s not a email');
        }else{
            $this->loginExist($sData);
        }

    }


    private function controlBookingDate($sData){
         $date =  Date('Y-m-d');

     var_dump($sData);
     var_dump($date);
        if ( $sData < $date ){
            throw new DomainException('Date depasse');
        }


    }


    private function controlBookingTime($sData){
        $heure =  Date('H:m');
        var_dump($sData);
        var_dump($heure);

        if ( $sData < $heure ){
            throw new DomainException('heure depasse');
        }

    }







}