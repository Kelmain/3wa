<?php


class MealController
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

        if (!isset($queryFields['idMenu'])) {

            $meals = $mealsModel->listAll();

            $usersession = new UserSession();
            $useridentity = $usersession->getFullName();
            $useremail = $usersession->getEmail();
            $userfirstname = $usersession->getFirstName();
            $isconnected = $usersession->isAuthenticated();


            return [
                'userfirstname' => $userfirstname,
                'useridentity' => $useridentity,
                'useremail' => $useremail,
                'isconnected' => $isconnected,
                'meals' => $meals


            ];

        } else {
            $meal = $mealsModel->listOne($queryFields['idMenu']);
            $http->sendJsonResponse($meal);

        }


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
