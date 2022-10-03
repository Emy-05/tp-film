<?php
//Soumission de formulaire
$userDao = new UserDAO(); // connexion bdd

// Initialisation des variables.
$email = "";
$password = "";
// Traitement du formulaire.
if (isset($_POST['connexion'])) /*(isset($_POST['password']))*/ {
    // Récupérer les information saisies.
    
    //  sanitizeString supprie tout code malintentionné eventuel et toute balise interdite d'une entrée de l'utilisateur.
    //$email = sanitizeString($_POST['email']);
    //$password = sanitizeString($_POST['password']);
    // Vérifier que l'utilisateur existe.

    if ($email == "" || $password == "") {
        //Tous les champs n\'ont pas été saisies';


    } else {
        //queryMySQL envoie une requete (query) à MySQL et produit un message d'erreur en cas d'échec.
        $result = queryMySQL("SELECT email, password FROM user WHERE email = '$email AND password = $password'");
       
        if ($result->rowCount() == 0);
        { 
            //Utilisateur non enregistré ou mot de pass non valide
            echo $twig->render('creer_user.html.twig');
        } else {
        /*L'email existe déjà, ouvrir session et enregistrer les données */
        $_SESSION['email'] = $email;
        $_SESSION['password'] = $password;
        /*Rediriger l'utilisateur vers la page d'accueil */
        /*Afficher le formulaire/template Twig correspondant*/
      
        echo $twig->render('rechercher_films.html.twig');

        /*Rediriger l'utilisateur vers la page d'accueil 
        en appelant la fonction générique url() pour être
        certain que l'identifiant de session est transmis
        quelles que soient les conditions.*/
    }
}