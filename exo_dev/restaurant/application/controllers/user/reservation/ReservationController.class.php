<?php
class ReservationController
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
        $userlastname = $usersession->getLastName();
        $useridentity = $usersession->getFullName();
        $useremail = $usersession->getEmail();
        $userfirstname = $usersession->getFirstName();
        $isconnected = $usersession->isAuthenticated();
        $userid = $usersession->getUserId();



        return [
            'userfirstname' => $userfirstname,
            'userlastname' => $userlastname,
            'useremail' => $useremail,
            'useridentity' => $useridentity,
            'isconnected' => $isconnected,
            'userid' => $userid

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
        //var_dump($formFields);



        $usersession = new UserSession();
        if (sizeof($formFields) > 0) {
            try {
                $booking = new ReservationModel();
                 $booking->Booking($usersession->getUserId(),$formFields);
                $http->redirectTo('user/reservation');



            } catch (DomainException $e) {
                return [
                    'error_message' => $e->getMessage(),
                    'userid' => $usersession->getUserId(),
                    'isconnected' => $usersession->isAuthenticated(),
                    'useridentity' => $usersession->getFullName()

                ];


            }
        }
    }
}