<?php

// Traitement du formulaire de connexion

if (isset($_POST['email']) && isset($_POST['password']) && isset($_POST['password2'])) {
    $usersDao = new UsersDAO(); // connexion bdd
    //var_dump($_POST['password']);
    if ($_POST['password'] == $_POST['password2']) {
        $userPasswordHash = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $user = new Users(null, $_POST['userName'], $_POST['email'], $userPasswordHash);
        //création user
        $status = $usersDao->add($user); // appelle contrôleur add pour ajouter un utilisateur
    } else {
        echo $twig->render('creer_user.html.twig', ["Erreur: Mots de passe differents"]);
    }

    //On affiche le template Twig correspondant
    if ($status) {
        echo $twig->render('creer_user.html.twig', ['status' => "Ajout OK", 'user' => $user]);
    } else {
        echo $twig->render('creer_user.html.twig', ['status' => "Erreur Ajout"]);
    }
} else { // on affiche le twig avec le formulaire pour ajouter l'film
    echo $twig->render('creer_user.html.twig');
}
