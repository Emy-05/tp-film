<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

//On appelle la fonction getAll() 
$filmsDao = new FilmsDAO(); // connexion bdd
/* @var $allmovies type */
if (isset($_POST["search"])) {
    $allmovies = $filmsDao->getAll($_POST["search"]);
} else {
    $allmovies = $filmsDao->getAll($search); // récupération de tous les films récupéré dans tableau d'offres
}

//On affiche le template Twig correspondant
echo $twig->render('rechercher_films.html.twig', ['allmovies' => $allmovies]);
// tableau transféré dans variable twig et on appelle le html spécial avec twig
