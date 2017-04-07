<?php
class UserController {
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

if ($formFields['Password'] != $formFields['controllpwd']){

    return ['error_message' => 'Error... Passwords do not match'];

}elseif  (sizeof($formFields) > 0) {
    try {
        $signup = new UserModel();
        $user = $signup->SignUp($formFields);
        // Si l'utilisateur a bien été créé ...
        if ($user > 0) {


            $usersession = new UserSession();
            $usersession->create($user,     // ID RECU LIGNE 31
                $formFields['FirstName'],    // recu depuis le form HTML
                $formFields['LastName'],     // recu depuis le form HTML
                $formFields['Email']);      // recu depuis le form HTML

            $http->redirectTo('');


        }


    }
    catch(DomainException $e){
        return ['error_message' => $e->getMessage()];
    }
}

    }

}


