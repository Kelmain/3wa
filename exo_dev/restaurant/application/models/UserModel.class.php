<?php

class UserModel
{

    private $aDataPost = [
        'FirstName'=> '',
        'LastName' => '',
        'Email' => '',
        'Password' => '',
        'BirthDate' => '',
        'Address' => '',
        'City' => '',
        'ZipCode' => '',
        'Country' => '',
        'Phone' => ''

    ];


    public function SignUp(array $values)
    {

        $sql = 'INSERT INTO User (FirstName, LastName, Email, Password, Birthdate, 
                                  Address, City, Zipcode, Country, Phone, CreationTimestamp) 
               VALUES (:FirstName,
                       :LastName,
                       :Email,
                       :Password,
                       :BirthDate,
                       :Address,
                       :City,
                       :ZipCode,
                       :Country,
                       :Phone,
                       NOW()
                       )';



        foreach ($this->aDataPost as $sIndex => $sName) {

            // Si on a recu en post
            if (array_key_exists($sIndex, $values)) {

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
            } else {
                // Si on a pas recu le champ on supprime
                $this->aDataPost[$sIndex] = '';
            }

        }





       $db = new Database();
       return $db->executeSql($sql, $this->aDataPost);
       // var_dump($this->aDataPost);

    }

    /**
     * hash de pwd
     */
    private function setPassword($sData)
    {
        return password_hash($sData, PASSWORD_DEFAULT);
    }

    /**
     * Control de pws
     */
    private function controlPassword($sData){

        if (strlen($sData )<= 4){
            throw new DomainException('password to short');
        }
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


    private function loginExist($sData){

        $sql = 'SELECT * FROM User WHERE Email = ? ';
        $db = new Database();
        $exist = $db->queryOne($sql, [$sData] );

            if ($exist != null){
                throw new DomainException('Email exist deja');
            }

    }





    public function Login ($email, $password){

        $sSql = 'SELECT Id ,FirstName,LastName, Password, Email from User WHERE Email = ?';

        //$this->controlEmail($email);

       $db = new Database();
       $donne = $db->queryOne($sSql,[$email]);



        if (password_verify(  $donne['Password'], $password))
        {
   echo ("Error... Passwords/Login do not match");

    }else{

            return $donne;
        }
    }



}