<?php
//session_start();  //$_SESSION 
//Elle va persister entre 2 variables php

// Traitement du formulaire de connexion

if (isset($_POST['email']) && isset($_POST['password'])) {
    $usersDao = new UsersDAO(); // connexion bdd

    $user = new Users($_POST['email'], $_POST['password']);
    //création user
    session_start();
    $_SESSION['date'] = date('\l\e d/m/Y à H:i:s');
    $_SESSION['email'] = $email;
    // Puis rediriger l'utilisateur vers la page d'accueil 
    // en appelant la fonction générique url() pour être
    // certain que l'identifiant de session est transmis
    // quelles que soient les conditions. $addUser = $usersDao->getOne($_POST['email']) && isset($_POST['password']);

    $status = $usersDao->add($user); // appelle contrôleur add pour ajouter un utilisateur

    //On affiche le template Twig correspondant
    if ($status) {
        echo $twig->render('login.html.twig', ['status' => "Ajout OK", 'user' => $user]);
    } else {
        echo $twig->render('login.html.twig', ['status' => "Erreur Ajout"]);
    }
} else { // on affiche le twig avec le formulaire pour ajouter l'film
    echo $twig->render('creer_user.html.twig');
}

/**
 * Ajoute utilisateur dans le fichier

 */
/*function addUser($email, $password)
{
    // Récupération de la liste de tous les utilisateurs
    $users = getUsers();
    // Ajout du nouvel utilisateur
    $users[$email] = [
        'password' => hashPassword($password),
        'token'    => generateToken()
    ];
    // Sauvegarde de la liste des utilisateurs
    saveUsers($users);
}
*/