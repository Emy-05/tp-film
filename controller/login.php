<?php

//Soumission de formulaire

$usersDao = new UsersDAO(); // connexion bdd

//création user
if (isset($_POST['email']) && isset($_POST['password'])) {
    $addUser = $usersDao->getOne($_POST['email']) && isset($_POST['password']);
} else { // login user
    //On affiche le template Twig correspondant
    echo $twig->render('login.html.twig');
}
