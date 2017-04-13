<?php
class OrderModel
{

  /*  private $aDataPost = [
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
*/

    public function createCde($iIdUser, array $aDataPanier)
    {
        $aDataBasket = array();

        $oMealModel = new MealModel();

        $fTotal = 0;
        foreach ($aDataPanier as $iIdMeal => $iQte)
        {
            $aInfosMenu = $oMealModel->listOne($iIdMeal);
            $aTmp = [];
            if ($aInfosMenu != null) {
                $fTotal += $aInfosMenu['SalePrice']*$iQte;
                // $aTmp['Id'], $aTmp['Name'], $aTmp['Photo'], $aTmp['SalePrice'], ...
                $aTmp[':Meal_Id'] 			= $iIdMeal;
                $aTmp[':PriceEach'] 		= $aInfosMenu['SalePrice'];
                $aTmp[':QuantityOrdered'] 	= $iQte;

                $aDataBasket[] = $aTmp;
            }
        }


        $aDataOrder = [
            ':TaxAmount'	=> ($fTotal*5.5)/100,
            ':TaxRate'		=> 5.5,
            ':TotalAmount'	=> $fTotal,
            ':User_Id'		=> $iIdUser
        ];

        $iIdCde = $this->addOrder($aDataOrder);


        if ($iIdCde > 0) {

            foreach ($aDataBasket as $aLine) {
                $aLine = array_merge([':Order_Id' => $iIdCde],$aLine);

                $this->addOrderLine($aLine);
            }
            return true;
        }
        return false;
    }


    private function addOrder(array $aData)
    {
        $sSql = 'INSERT INTO `Order` 
		
			(TaxAmount, TaxRate, TotalAmount, User_Id, CreationTimestamp, CompleteTimestamp) 
			
			VALUES (
				:TaxAmount,
				:TaxRate,
				:TotalAmount, 
				:User_Id,
				NOW(),
				NOW()
			)';

        $database = new Database();
        return $database->executeSql($sSql, $aData);
    }


    private function addOrderLine(array $aData)
    {
        $sSql = 'INSERT INTO `OrderLine` 
		
			(Meal_Id, PriceEach, QuantityOrdered, Order_Id) 
			
			VALUES (
				:Meal_Id,
				:PriceEach,
				:QuantityOrdered, 
				:Order_Id
			)';

        $database = new Database();
        return $database->executeSql($sSql, $aData);
    }












}