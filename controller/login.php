<?php
//isset = verifier email et password sont rentrés dans le formulaire
if (isset($_POST["email"]) && isset($_POST["password"])) {
    $emailUser = $_POST["email"];
    $passwordHash = password_hash($_POST['password'], PASSWORD_DEFAULT);
    // on hashe le password reçu par formulaire qu'on récupère dans une variable

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
        if (($userEmail == $_POST["email"])) {
            $_SESSION['email'] = $userEmail;
            $_SESSION['userName'] = $userName;
            $_SESSION['idUser'] = $idUser;
            $_SESSION['password'] = $password;

            if (password_verify($userPassword, $passwordHash)) {
                echo "connexion réussie";
            } else {
                echo "identifiants invalides";
            }

            //Si le Remember me est coché
            if (isset($_POST['remember'])) {
                setcookie($userEmail, $UserPassword);
            }

            header('location:rechercher_films');
        } else {
            echo $twig->render('login.html.twig', ['password' => 'Pas de connexion.']);
        }
    } else {
        echo $twig->render('login.html.twig', ['creer_user.html.twig' => 'Créer votre compte']);
    }
} else {
    echo $twig->render('login.html.twig', ['password' => "Veuillez entrer email et mot de passe"]);
}
