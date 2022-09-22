<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

if (isset($_POST['title']) && isset($_POST['description'])) { // on récupère titre et description
    $filmsDao = new FilmsDAO(); // connexion bdd


    $film = new Films(null, $_POST['title'], $_POST['description']);
    //création offre

    //$offre->set_title("JEE Developpeur");
    //$offre->set_description("Super job de développeur");

    $status = $filmsDao->add($film); // appelle contrôleur add pour ajouter une offre

    //On affiche le template Twig correspondant
    if ($status) {
        echo $twig->render('creer_film.html.twig', ['status' => "Ajout OK", 'film' => $film]);
    } else {
        echo $twig->render('creer_film.html.twig', ['status' => "Erreur Ajout"]);
    }
} else { // on affiche le twig avec le formulaire pour ajouter l'offre
    echo $twig->render('creer_film.html.twig');
}
