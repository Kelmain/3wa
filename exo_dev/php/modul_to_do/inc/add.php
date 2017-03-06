<?php
/**
 * Created by PhpStorm.
 * User: wap6
 * Date: 06/03/17
 * Time: 10:25
 */
include 'utilities.php';

//var_dump ($_POST);



function addTask($sTitle, $sDescription, $sDate, $iPriority){

    $aField=array($sTitle, $sDescription, $sDate, $iPriority);
    saveInCSV($aField);

}

if ( !empty ($_POST['title']) &&
    isset($_POST['message']) &&
    isset($_POST['date']) &&
    isset ($_POST['important'])
) {
    addTask(htmlspecialchars($_POST['title']),htmlspecialchars($_POST['message']),htmlspecialchars($_POST['date']),htmlspecialchars($_POST['important']));
}

header('location:../index.php');
exit();