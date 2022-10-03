<?php
//On affiche le template Twig correspondant
echo $twig->render('header.html.twig');

//session_start();

$userstr = 'Bienvenue, Vous etes connecté';
//$randst: pour que chaque page chargé soit unique à l'interface. 
$randstr = substr(md5(rand()), 0, 7);

//verifier que la variable de session ... possede une valeur coourante
if (isset($_SESSION['email'])) {
  $email = $_SESSION['email'];
  $loggedin = TRUE;      // Utilisateur identifié
  $userstr  = "Connecté en tant que : $email";
} else $loggedin = FALSE;  // Utilisateur non identifié


if ($loggedin) {
  echo <<<_CONNECTE
        <div class='center'>
          <a data-role='button' data-inline='true' data-icon='home'
            data-transition="slide" href='members.php?view=$user&r=$randstr'>Accueil</a>
          <a data-role='button' data-inline='true' data-icon='user'
            data-transition="slide" href='members.php?r=$randstr'>Membres</a>
          <a data-role='button' data-inline='true' data-icon='mail'
            data-transition="slide" href='messages.php?r=$randstr'>Messages</a>
          <a data-role='button' data-inline='true' data-icon='edit'
            data-transition="slide" href='profile.php?r=$randstr'>Mon profil</a>
          <a data-role='button' data-inline='true' data-icon='action'
            data-transition="slide" href='logout.php?r=$randstr'>Se déconnecter</a>
        </div>
        
_CONNECTE;
} else {
  echo <<<_INVITE
        <div class='center'>
          <a data-role='button' data-inline='true' data-icon='home'
            data-transition='slide' href='index.php?r=$randstr''>Accueil</a>
          <a data-role='button' data-inline='true' data-icon='plus'
            data-transition="slide" href='signup.php?r=$randstr''>S'inscrire</a>
          <a data-role='button' data-inline='true' data-icon='check'
            data-transition="slide" href='login.php?r=$randstr''>Se connecter</a>
        </div>
        <p class='info'>(Connectez-vous pour utiliser cette application)</p>
        
_INVITE;
}
