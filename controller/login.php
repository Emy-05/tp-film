<?php
//isset = verifier email et password sont rentrés dans le formulaire
if (isset($_POST["email"]) && isset($_POST["password"])) {
    $userDao = new UsersDAO(); //connexion dbb
    //Cherche fonction get_user dans UserDAO 
    $user = $userDao->get_user(($_POST["email"]));
    // Si user exist nous recuperons les getters
    if ($user != null) {
        $userEmail = $user->get_email();
        $userPassword = $user->get_password();
        $userName = $user->get_userName();
        $idUser = $user->get_idUser();
        // Vérifier que l'email et le password correspondent à un utilisateur.
        if (($userEmail == $_POST["email"]) && ($userPassword == $_POST["password"])) {
            $_SESSION['email'] = $userEmail;
            $_SESSION['userName'] = $userName;
            $_SESSION['idUser'] = $idUser;
            //Si le Remember me est coché
            if (isset($_POST['remember'])) {
                setcookie($userEmail, $UserPassword);
            }

            header('location:rechercher_film');
        } else {
            echo $twig->render('login.html.twig', ['password' => 'Pas de connexion.']);
        }
    } else {
        echo $twig->render('login.html.twig', ['creer_user.html.twig' => 'Créer votre compte']);
    }
} else {
    echo $twig->render('login.html.twig', ['password' => "Veuillez entrer email et mot de passe"]);
}
