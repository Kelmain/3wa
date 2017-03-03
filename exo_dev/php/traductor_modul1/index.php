<?php 


//var_dump ($_POST);






//var_dump ($tradinput);
//on verifer si le champ est vide
//on verifer si le mot exist dans notre tableau est si oui on le traduire
$sText='';
$sErrorMsg = '';
function translate($sText, $direction) 
{

$adictonary = [
'cat'    => 'chat',
		'dog'    => 'chien',
		'monkey' => 'singe',
		'sea'    => 'mer',
		'sun'    => 'soleil'
];
    $sTrad='';
$sErrorMsg = '';
	// Inutile de array_flip si le mot est vide
	// si la traduction est demandée en anglais
	if ($direction == 'toEnglish') {
		// Je control que la valeur existe dans mon tableau
		if (in_array($sText, $adictonary)) 
		{
			
            $sTrad = array_search($sText, $adictonary);
            
		}
		else 
		{
			// sinon on ne connait pas ce mot ...
			// ... on enregistre dans $sErrorMsg le 
			// fait qu'on ne connait pas ce mot
			$sErrorMsg = 'Je ne connais pas ce mot.';
		}
	}
	// sinon en francais si la valeur du champ existe dans notre dictionnaire	
	elseif (array_key_exists($sText, $adictonary) ) 
	{
		// On enregistre la traduction dans la chaine $sText
		$sTrad = $adictonary[$sText];
	}
	else 
	{
		// sinon on ne connait pas ce mot ...
		// ... on enregistre dans $sErrorMsg le 
		// fait qu'on ne connait pas ce mot
		$sErrorMsg = 'Je ne connais pas ce mot.';
	}	
return array( 
		'error'	=> $sErrorMsg,
		'trad'	=> $sTrad
	);
}






// Si on recoit une soummission de formulaire
if (sizeof($_POST) > 0) {
	
	// Si le champ text a été rempli
	if (!empty($_POST['word']) && !empty($_POST['direction']))
        {
		
		//....
		$aTab=translate($_POST['word'], $_POST['direction']);
        $sText = $aTab['trad'];
		$sErrorMsg = $aTab['error'];

		
	} 
	// sinon le champ est vide
	else {
		// sinon le champ est vide on enregistre dans $sErrorMsg  
		$sErrorMsg = 'Vous devez rentrer un mot.';
	}
}
	








/*
    
    switch($direction) {
        
    case 'toEnglish':
        $sText = $adictonary[$tradinput];
      break;
    case 'toFrench':
         $sText= array_search($tradinput, $adictonary);
     break;
}
    
  

  */

include 'views/layout.phtml';