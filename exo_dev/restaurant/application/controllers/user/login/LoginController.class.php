<?php
class LoginController {

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
        //var_dump($formFields);
        try {
            $login = new UserModel();
            $user = $login->Login($formFields['Email'], $formFields['Password']);


            //var_dump($user);
            if ($user != null) {
                $usersession = new UserSession();
                $usersession->create($user['Id'], $user['FirstName'], $user['LastName'], $user['Email']);

                $http->redirectTo('');
            }
        }
        catch(DomainException $e)
        {
            return ['error_message' => $e->getMessage()];
        }
        }

}