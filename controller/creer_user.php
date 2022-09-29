<?php
//session_start();  //$_SESSION 
//Elle va persister entre 2 variables php

// Formulaire de connexion


//Soumission de formulaire

if (isset($_POST['email']) && isset($_POST['password'])) {
    $usersDao = new UsersDAO(); // connexion bdd

    $user = new User(null, $_POST['email'], $_POST['password']);
    //création user


    $status = $usersDao->add($user); // appelle contrôleur add pour ajouter un utilisateur

    //On affiche le template Twig correspondant
    if ($status) {
        echo $twig->render('creer_user.html.twig', ['status' => "Ajout OK", 'utilisateur' => $user]);
    } else {
        echo $twig->render('creer_user.html.twig', ['status' => "Erreur Ajout"]);
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