<?php
//session_start();  //$_SESSION 
//Elle va persister entre 2 variables php

// Formulaire de connexion

/*@$login = $_POST["login"];
@$password = $_POST["pass"];
@$valider = $_POST["valider"];
$bonLogin = "userFilm";
$bonPass = "007";
$erreur = "";
if (isset($valider)) {
    if ($login == $bonLogin && $password == $bonPass) {
        echo $twig->render('connexion.html.twig', ['status' => "Ajout OK", 'film' => $film]);
    } else {

        echo $twig->render('connxion.html.twig', ["Mauvais login ou mot de passe!"]);
        $erreur = "Mauvais login ou mot de passe!";
    }
}*/

//Soumission de formulaire

if (isset($_POST['email']) && isset($_POST['password'])) {
    $utilisateursDao = new UtilisateursDAO(); // connexion bdd

    $utilisateur = new Utilisateurs(null, $_POST['email'], $_POST['password']);
    //création user


    $status = $utilisateursDao->add($utilisateur); // appelle contrôleur add pour ajouter un utilisateur

    //On affiche le template Twig correspondant
    if ($status) {
        echo $twig->render('creer_compte.html.twig', ['status' => "Ajout OK", 'utilisateur' => $utilisateur]);
    } else {
        echo $twig->render('creer_compte.html.twig', ['status' => "Erreur Ajout"]);
    }
} else { // on affiche le twig avec le formulaire pour ajouter l'film
    echo $twig->render('creer_compte.html.twig');
}
