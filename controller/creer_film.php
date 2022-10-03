<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
//checker si connecté
if (isset($_SESSION['email'])) {
    if (isset($_POST['titre']) && isset($_POST['realisateur']) && isset($_POST['affiche']) && isset($_POST['annee'])) { // on récupère les infos du film envoyés par le formulaire
        $filmsDao = new FilmsDAO(); // connexion bdd


        $film = new Films(null, $_POST['titre'], $_POST['realisateur'], $_POST['affiche'], $_POST['annee']);
        //création nouveau film

        $status = $filmsDao->add($film); // appelle contrôleur add pour ajouter une film

        //On affiche le template Twig correspondant
        if ($status) {
            echo $twig->render('creer_film.html.twig', ['status' => "Ajout OK", 'film' => $film]);
        } else {
            echo $twig->render('creer_film.html.twig', ['status' => "Erreur Ajout"]);
        }
    } else { // on affiche le twig avec le formulaire pour ajouter l'film
        echo $twig->render('creer_film.html.twig');
    }

    // si pas connecté on affiche lien pour la connexion else 
} else {
    header("Location:connexion");
}
