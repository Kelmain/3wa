<?php
class CreationModel
{

    private $aDataPost = [
        'Name' => '',
        'Description' => '',
        'QuantityInStock' => '',
        'BuyPrice' => '',
        'SalePrice' => ''


    ];


    public function CreationMeal(array $values, $photo)
    {

        $sql = 'INSERT INTO Meal (Name, Description, QuantityInStock, BuyPrice, SalePrice; Photo) 
               VALUES (:Name,
                       :Description,
                       :QuantityInStock,
                       :BuyPrice,
                       :SalePrice,
                       :Photo
                       )';




        var_dump($photo);
$this->photo($photo);
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

  public  function photo($photo){
        $nom =  'application/www/images/meals/'.$photo['Photo']['name'];

        if ($photo['Photo']['error'] > 0)
        {
            echo "Erreur lors du transfert";
        }else {
            $resultat = move_uploaded_file($photo['Photo']['tmp_name'], $nom);
            if($resultat){
                echo "transfert reussi";
            }
        }

    }





}
