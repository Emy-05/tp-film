<?php

if (isset($_POST['idFilm'])) {
    $filmsDao = new FilmsDao();

    $status = $filmsDao->deleteFilm((int) $_POST['idFilm']);


    if ($status == 1) {
        echo $twig->render('supprimer_film.html.twig', ['status' => "Suppression effectuée"]);
    } else {
        echo $twig->render('supprimer_film.html.twig', ['status' => "Erreur lors de la suppression"]);
    }
}
