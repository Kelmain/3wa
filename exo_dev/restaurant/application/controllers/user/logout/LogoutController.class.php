<?php
class LogoutController
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
        $usersession->destroy();

        $http->redirectTo('');


        /*$useridentity=$usersession->getFullName();
        $useremail=$usersession->getEmail();
        $userfirstname=$usersession->getFirstName();
        $isconnected=$usersession->isAuthenticated();
        var_dump($isconnected);

        return [
            'userfirstname' => $userfirstname,
            'useridentity' => $useridentity,
            'useremail' => $useremail,
            'isconnected' => $isconnected

        ];*/
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