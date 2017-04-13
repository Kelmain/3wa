<?php
include 'utilities.php';

if (!empty($_POST['deleteall'])) {
    $aTmpTasks = loadTasks();
    $aTasks = delete($aTmpTasks, $_POST['deleteall']);
    $rFile = fopen(TODO, 'w');

foreach ($aTasks as $iLigne =>$aCols){
    fputcsv($rFile, $aCols);
}
fclose($rFile);
}

function delete(array $aTmpTasks, array $aListDelete){
$aTasks = array();
    foreach ($aTmpTasks as $iIndex => $aCols) {
        if (isset($aListDelete[$iIndex])) {

           continue;

        }
        $aTasks[] = $aCols;


    }
    return $aTasks;
}

header('location:../index.php');
/*if (isset($_POST['deleteall'])){
    var_dump($_POST['deleteall']);


}*/

