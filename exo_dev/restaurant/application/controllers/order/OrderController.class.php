<?php



class OrderController
{

    public function httpGetMethod(Http $http, array $queryFields)
    {
        /*
         * Méthode appelée en cas de requête HTTP GET
         *
         * L'argument $http est un objet permettant de faire des redirections etc.
         * L'argument $queryFields contient l'équivalent de $_GET en PHP natif.
    */




    }

    public function httpPostMethod(Http $http, array $formFields)
    {
        /*
         * Méthode appelée en cas de requête HTTP POST
         *
         * L'argument $http est un objet permettant de faire des redirections etc.
         * L'argument $formFields contient l'équivalent de $_POST en PHP natif.
         */
        $mealsModel = new MealModel();
        $baskets = new BasketSession();
        $usersession = new UserSession();
        $command = $baskets->getBasket();
        $aDataBasket = [];
        $iIdUser = $usersession->getUserId();

        //var_dump($command);
        //var_dump($usersession->getUserId());
        if (sizeof($command) > 0 ) {

            if($iIdUser > 0) {
                $oOrderModel = new OrderModel();
                if ($oOrderModel->createCde($iIdUser, $command)) {
                    $baskets->destroy();
                }
            }
            else{
                $http->redirectTo('/user/login');
            }
        }else{
            $http->redirectTo('/meal');
        }



        foreach ($command as $iIdMeal => $iQte) {

            $aTmp = $mealsModel->listOne($iIdMeal);
            if ($aTmp != null) {

                $aTmp['quantite'] = $iQte;
                $aDataBasket[] = $aTmp;
            }
        }




        return [

            'userid' => $iIdUser,
            'isconnected' => $usersession->isAuthenticated(),
            'useridentity' => $usersession->getFullName(),
            'aDataBasket'   => $aDataBasket

        ];




    }
}
