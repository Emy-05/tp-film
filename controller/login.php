
<?php

if (isset($_POST["email"]) and isset($_POST["password"])) {
    $userDao = new UsersDAO(); //connexion dbb
    $user = $userDao->get_user($_POST["email"]);
    if ($user != null) {
        $userEmail = $user->get_email();
        $userPassword = $user->get_password();
        $userName = $user->get_userName();
        $id = $user->get_idUser();
        if (($userEmail == $_POST["email"]) && ($userPassword == $_POST["password"])) {
            $_SESSION['email'] = $userEmail;
            $_SESSION['userName'] = $userName;
            $_SESSION['idUser'] = $id;
            if (isset($_POST["remember"])) {
                setcookie("email", $email);
            }
            header('location:user');
        } else {
            echo $twig->render('login.html.twig', ['password' => 'true']);
        }
    } else {
        echo $twig->render('login.html.twig', ['password' => 'true']);
    }
} else {
    if (isset($_COOKIE["email"])) {
        echo $twig->render('login.html.twig', ['email' => $_COOKIE["email"]]);
    } else {
        echo $twig->render('login.html.twig');
    }
}
