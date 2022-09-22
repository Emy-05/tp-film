<?php

if (isset($_POST['id'])) {
    $filmsDao = new FilmsDao();

    $status = $filmsDao->deleteFilm((int) $_POST['id']);


    if ($status == 1) {
        echo $twig->render('supprimer_film.html.twig', ['status' => "Suppression effectuée"]);
    } else {
        echo $twig->render('supprimer_film.html.twig', ['status' => "Erreur lors de la suppression"]);
    }
}
