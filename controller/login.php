<?php
require_once 'header.php';
//Soumission de formulaire
$usersDao = new UsersDAO(); // connexion bdd

// Initialisation des variables.
$email = $password = $error = '';
// Traitement du formulaire.
if (isset($_POST['email'])) /*(isset($_POST['password']))*/
{
    // Récupérer les information saisies.
    //  sanitizeString supprie tout code malintentionné eventuel et toute balise interdite d'une entrée de l'utilisateur.
    $email = sanitizeString($_POST['email']);
    $password = sanitizeString($_POST['password']);
    // Vérifier que l'utilisateur existe.

    if ($email == "" || $password == "") {
        $error = 'Tous les champs n\'ont pas éré saisies';
    } else {
        //queryMySQL envoie une requete (query) à MySQL et produit un message d'erreur en cas d'échec.
        $result = queryMySQL("SELECT email, password FROM user 
        WHERE email = '$email AND password = $password);
       
        if ($result->rowCount() == 0);
        { 
            $error  = 'Utilisateur non enregistré ou mot de pass non valide';
            $error .= 'Enregistrez-vous.';
            /*Afficher le formulaire/template Twig correspondant*/
            echo $twig->render('creer_user.html.twig');
        } else
        /* Vérifier que l'utilisateur existe= ouvrir session et
        enregistrer les données de session. */
        {
        /*session_start();*/
        $_SESSION[email] = $email;
        $_SESSION[password] = $password;
        echo $twig->render('accueil.html.twig');
        die (  'Vous estes connecté. Cliquez ici pour continuer' );
        /*Puis rediriger l'utilisateur vers la page d'accueil 
        en appelant la fonction générique url() pour être
        certain que l'identifiant de session est transmis
        quelles que soient les conditions.*/
    }
       /* header('location: ' . ('/login.php'));
        exit;*/
    } 
     

}

/*//la session de l'usuaire reste activée 
if (!isset($_SESSION[LOGGED_USER]));*/

/*if (isset($_POST[email]) && isset($_POST[password])) {

    $user = new Users(null, $_POST[email], $_POST[password]);
    //création user
    session_start();
    $_SESSION[email] = $email;
    // Puis rediriger l'utilisateur vers la page d'accueil 
    // en appelant la fonction générique url() pour être
    // certain que l'ide ntifiant de session est transmis
    // quelles que soient les conditions. $addUser = $usersDao->getOne($_POST[email]) && isset($_POST[password]);

    $status = $usersDao->add($user); // appelle contrôleur add pour ajouter une film

    //On affiche le template Twig correspondant
    if ($status) {
        echo $twig->render('login.html.twig', ['status' => 'Ajout OK', 'user' => $user]);
    } else {
        echo $twig->render('login.html.twig', ['status' => 'Erreur Ajout']);
    }
} else { // on affiche le twig avec le formulaire pour ajouter un nouveau utilisateur
    echo $twig->render('creer_user.html.twig');
}*/