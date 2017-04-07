<?php
/**
 * Created by PhpStorm.
 * User: wap6
 * Date: 06/03/17
 * Time: 11:29
 */
define('TODO', __DIR__.'/../source/todolist.csv');

function saveInCSV(array $aDATACsv = array()){
    $rdata = fopen(TODO, 'a+');

        fputcsv($rdata, $aDATACsv);
    fclose($rdata);
}




//var_dump ($_POST);




function loadTasks()
{
    // variable imposé par Tommy
    $aTasks = array();

    // Ouvertur du fichier
    $rFile = fopen(TODO, 'r');

    // boucler à l' "infini"
    while (true)
    {
        // On lit le fichier ligne par ligne et enregistre dans une variable temporaire
        // @see : http://php.net/manual/fr/function.fgetcsv.php
        $aTmpTasks = fgetcsv($rFile);

        // si la variable temporaire retourne false (via fgetcsv)
        if ($aTmpTasks == false) {
            // c'est la fin du fichier
            break;
        }

        // on peut enregistrer la ligne (tableau) dans notre variable
        $aTasks[] = $aTmpTasks;
    }
    fclose($rFile);
    // Retourne la liste des données récupérées
    return $aTasks;

}

