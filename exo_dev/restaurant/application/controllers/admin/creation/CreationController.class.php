<?php

class CreationController
{

    public function httpGetMethod(Http $http, array $queryFields)
    {
        /*
         * Méthode appelée en cas de requête HTTP GET
         *
         * L'argument $http est un objet permettant de faire des redirections etc.
         * L'argument $queryFields contient l'équivalent de $_GET en PHP natif.
    */



        $usersession = new UserSession();
        $useridentity = $usersession->getFullName();
        $useremail = $usersession->getEmail();
        $userfirstname = $usersession->getFirstName();
        $isconnected = $usersession->isAuthenticated();
//var_dump($isconnected);

        return [
            'userfirstname' => $userfirstname,
            'useridentity' => $useridentity,
            'useremail' => $useremail,
            'isconnected' => $isconnected


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
       // var_dump($http);
//var_dump($_FILES);
        //var_dump($formFields);
        $photo = $_FILES;
        if  (sizeof($formFields) > 0) {
            try {
                $creationmeal = new CreationModel();
                $meal = $creationmeal->CreationMeal($formFields, $photo);



            }
            catch(DomainException $e){
                return ['error_message' => $e->getMessage()];
            }
        }

    }


}
