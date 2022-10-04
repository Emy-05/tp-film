<<<<<<< HEAD
=======

>>>>>>> 4cc743cd130badf78fd8a9f396d03c276fbc6a3c
<?php

if (isset($_POST["email"]) and isset($_POST["password"])) {
    $userDao = new UsersDAO(); //connexion dbb
    $user = $userDao->get_user(($_POST["email"]) and ($_POST["password"]));

    if ($user != null) {
        $userEmail = $user->get_email();
        $userPassword = $user->get_password();
        $userName = $user->get_userName();
        $idUser = $user->get_idUser();

        if (($userEmail == $_POST["email"]) && ($userPassword == $_POST["password"])) {
            $_SESSION['email'] = $userEmail;
            $_SESSION['userName'] = $userName;
            $_SESSION['idUser'] = $idUser;
            header('location:login');
        } else {
            echo $twig->render('login.html.twig', ['password' => 'true']);
        }
    } else {
        echo $twig->render('login.html.twig', ['password' => 'true']);
    }
} else {
    echo $twig->render('login.html.twig');
}
