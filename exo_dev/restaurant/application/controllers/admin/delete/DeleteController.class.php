<?php

class DeleteController
{
    public function httpGetMethod(Http $http, array $queryFields)
    {
        /*
         * Méthode appelée en cas de requête HTTP GET
         *
         * L'argument $http est un objet permettant de faire des redirections etc.
         * L'argument $queryFields contient l'équivalent de $_GET en PHP natif.
    */
        // var_dump($queryFields);
        $user = new UsersAdminModel();
        $usersession = new UserSession();
        if ($queryFields['id'] == $usersession->getUserId()) {
          echo 'vous pouvez pas vous supprime';
        } else {

            $user->DeleteUser($queryFields['id']);
        }
        $http->redirectTo('admin/users');

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