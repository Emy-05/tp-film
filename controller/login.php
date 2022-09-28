<?php

//Soumission de formulaire

if (isset($_POST['email']) && isset($_POST['password'])) {

    /*foreach ($users as $user) {
        //utilisateur trouvée
    }*/
    $utilisateursDao = new UtilisateursDAO(); // connexion bdd

    $utilisateur = new Utilisateurs(null, $_POST['email'], $_POST['password']);
    //création user


    $status = $utilisateursDao->add($utilisateur); // appelle contrôleur add pour ajouter une film

    //On affiche le template Twig correspondant
    if ($status) {
        echo $twig->render('login.html.twig', ['status' => "Ajout OK", 'utilisateur' => $utilisateur]);
    } else {
        echo $twig->render('login.html.twig', ['status' => "Erreur Ajout"]);
    }
} else { // on affiche le twig avec le formulaire pour ajouter un nouveau utilisateur
    echo $twig->render('login.html.twig');
}


//la session de l'usuaire reste activée 
if (!isset($_SESSION['LOGGED_USER']));
