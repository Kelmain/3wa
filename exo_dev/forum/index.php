<?php

$aUser = [
    'pw' =>'kangourou',
    'user' =>'test',
];


if (isset($_POST['user']) AND isset($_POST['pw'])){
    $login=htmlspecialchars($_POST['user']);
    $pw=htmlspecialchars($_POST['pw']);

    if (in_array($login, $aUser) AND in_array($pw, $aUser)){
        echo "bienvenue";
    }else {
        echo "donne votre user et mdp";
    }

}else {
    echo "donne votre user et mdp";
};

