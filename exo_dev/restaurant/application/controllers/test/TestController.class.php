<?php
class TestController
{
    public function httpGetMethod(Http $http, array $queryFields)
    {
        /*
         * Méthode appelée en cas de requête HTTP GET
         *
         * L'argument $http est un objet permettant de faire des redirections etc.
         * L'argument $queryFields contient l'équivalent de $_GET en PHP natif.
         */
        //var_dump($queryFields);


        return ['name' => '',
            'lastname' => ''
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
        return ['name' => $formFields['name'],
        'lastname' => $formFields['lastname']
        ];
    }
}

