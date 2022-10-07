<?php

// Traitement du formulaire de connexion

if (isset($_POST['email']) && isset($_POST['password'])) {
    $usersDao = new UsersDAO(); // connexion bdd
    //var_dump($_POST['password']);
    $user = new Users(null, $_POST['userName'], $_POST['email'], $_POST['password']);
    //création user

    $status = $usersDao->add($user); // appelle contrôleur add pour ajouter un utilisateur

    //On affiche le template Twig correspondant
    if ($status) {
        echo $twig->render('creer_user.html.twig', ['status' => "Ajout OK", 'user' => $user]);
    } else {
        echo $twig->render('creer_user.html.twig', ['status' => "Erreur Ajout"]);
    }
} else { // on affiche le twig avec le formulaire pour ajouter l'film
    echo $twig->render('creer_user.html.twig');
}
