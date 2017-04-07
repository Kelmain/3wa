<?php

// Récupére la liste de tout les posts (articles)
$aPosts = getListPosts($pdo);

// affichage de la vue
include 'php/user/index.phtml';