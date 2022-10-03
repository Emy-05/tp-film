<?php
if (isset($_POST['email']))
{
    // Récupérer les information saisies.
    $email = sanitizeString($_POST['email']);
    $password = sanitizeString($_POST['password']);
    // Vérifier que l'utilisateur existe.

    if ($email == "" || $password == "") {
        $error = 'Tous les champs n\'ont pas éré saisies';
    } else {
         
        $result = queryMySQL("SELECT email, password FROM user 
        WHERE email = '$email AND password = $password);
       
        if ($result->rowCount())
        { 
            $error  = 'Ce email existe déjà<br><br>';
            /*Afficher le formulaire/template Twig correspondant*/
            echo $twig->render('login.html.twig');
        }
        else
        /* Vérifier que l'utilisateur existe= ouvrir session et
        enregistrer les données de session. */
        {
            $result = queryMySQL("INSERT INTO user VALUES ('$email','$password')");
            die ('h4Compte créé>/h4>Veuillez vous connecter. >/div></body></html>
    } 

}

session_start();  //$_SESSION 
//Elle va persister entre 2 variables php

// Traitement du formulaire de connexion

if (isset($_POST['email']) && isset($_POST['password'])) {
    $usersDao = new UsersDAO(); // connexion bdd

    $user = new Users($_POST['email'], $_POST['password']);
    //création user
    
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

