<?php

class UsersAdminModel {


public function UsersAll ()
{
    $sSql = 'SELECT * FROM User ';



    $db = new Database();
    return  $db->query($sSql);

}

public function DeleteUser ($id) {

    $sSql = 'DELETE  FROM User WHERE Id = ? ';



    $db = new Database();
    return  $db->queryOne($sSql,[$id]);
}

}