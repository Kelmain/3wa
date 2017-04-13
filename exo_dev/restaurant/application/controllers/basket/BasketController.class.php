<?php



class BasketController
{

    public function httpGetMethod(Http $http, array $queryFields)
    {
        /*
         * Méthode appelée en cas de requête HTTP GET
         *
         * L'argument $http est un objet permettant de faire des redirections etc.
         * L'argument $queryFields contient l'équivalent de $_GET en PHP natif.
    */


        $mealsModel = new MealModel();

        $baskets = new BasketSession();

        $aDataBasket = [];

        if(isset ($queryFields['deletes'])) {
            //var_dump($queryFields['deletes']);
            $baskets->deleteProduct($queryFields['deletes']);
        }


        elseif (
            isset($queryFields['qte'])
            && $queryFields['qte'] >= 1
            && ctype_digit($queryFields['qte'])
            && isset($queryFields['idMeal'])
        ) {
            $bExists = $mealsModel->listOne($queryFields['idMeal']);
            if ($bExists != null) {
                $setbasket = $baskets->setBasket($queryFields['idMeal'], $queryFields['qte']);
            }
        }

        $aContentBasket = $baskets->getBasket();




        foreach ($aContentBasket as $iIdMeal => $iQte) {

            $aTmp = $mealsModel->listOne($iIdMeal);
            if ($aTmp != null) {

            $aTmp['quantite'] = $iQte;
            $aDataBasket[] = $aTmp;
        }
    }



            return [

                'aDataBasket'   => $aDataBasket,
                '_raw_template' => true

            ];

    }

    public function httpPostMethod(Http $http, array $formFields)
    {
        /*
         * Méthode appelée en cas de requête HTTP POST
         *
         * L'argument $http est un objet permettant de faire des redirections etc.
         * L'argument $formFields contient l'équivalent de $_POST en PHP natif.
         */


    }
}
