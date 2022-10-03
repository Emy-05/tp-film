<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 
 */

class UserDAO extends Dao
{
    // Fonction qui vérifie que l'identification saisie 
    // est correcte.
    /* function utilisateur_existe($email, $password)
    {
        // Définition et exécution d'une requête préparée
        $sql  = 'SELECT 1 FROM users ';
        $sql .= 'WHERE email = ? AND password = ?';
        $requête = mysqli_stmt_init($connexion);
        $ok = mysqli_stmt_prepare($requête, $sql);
        $ok = mysqli_stmt_bind_param($requête, 'ss', $email, $password);
        $ok = mysqli_stmt_execute($requête);
        mysqli_stmt_bind_result($requête, $existe);
        $ok = mysqli_stmt_fetch($requête);
        mysqli_stmt_free_result($requête);
        // L'identification est bonne si la requête a retourné 
        // une ligne (l'utilisateur existe et le mot de passe 
        // est bon).
        // Si c'est le cas $existe contient 1, sinon elle est 
        // vide. Il suffit de la retourner en tant que booléen.
        return (bool) $existe;
    }*/

    //Récupérer tous les utilisateurs
    public function getAll()
    {
        //On définit la bdd pour la fonction

        $query = $this->_bdd->prepare("SELECT user.idUser, email, password, userName FROM user");
        $query->execute();
        $users = array();

        while ($data = $query->fetch()) {
            $users[] = new User($data['idUser'], $data['email'], $data['password'], $data['userName']);
        }
        return ($users);
    }

    //Ajouter un utilisateur
    public function add($data)
    {
        //Requete d'insertion INNER JOIN dans le MODEL
        $valeurs = ['email' => $data->get_email(), 'password' => $data->get_password()];
        $requete = 'INSERT INTO user (email, password) VALUES (:email, :password)';
        $insert = $this->_bdd->prepare($requete);
        if (!$insert->execute($valeurs)) {
            //print_r($insert->errorInfo());
            return false;
        } else {
            return true;
        }
    }
    /* $req2 = $database->prepare('INSERT INTO user VALUES(:email, :password');
    $req2->execute(array(
        'email' => $_POST['email'],
        'password' => $_POST['password'],
        'type' => 'normal'
        ));*/

    //$result = queryMySQL("INSERT INTO user VALUES email, password 
    //WHERE email = '$email AND password = $password);


    public function getOne($id_user)
    {

        $query = $this->_bdd->prepare('SELECT * FROM user WHERE user.idUsers = :id_user')->fetch(PDO::FETCH_ASSOC);
        $query->execute(array(':id_user' => $id_user));
        $data = $query->fetch();
        $user = new User($data['id_user'], $data['email'], $data['password']);
        return ($user);
    }


    // supprimer 1 user grâce à son id
    public function deleteUser($idUser): int
    {
        $query = $this->_bdd->prepare('DELETE FROM user WHERE user.idUser = :idUser');
        $query->execute(array('idUser' => $idUser));
        return ($query->rowCount());
    }


    /*-----------------------------
    class UserDAO {
   
        /**
         * sauvegarde un utilisateur en bdd
         * @param type $user tableau associatif
         * @return boolean true si insertion ok
         * @throws AlreadyExistException si l'utilisateur existe déjà
         */
    /*public static function save($user){
            $bdd = connectDB();
            
            //exist déjà ?
            $stmt = $bdd->prepare('SELECT * FROM user WHERE login = :login');
            $stmt->bindValue(':login', $user['login']);
            $stmt->execute();
            $rows = $stmt->fetch(PDO::FETCH_NUM);
            if( $rows > 0 ){
               throw new AlreadyExistException();
            }
    
            
            
            $stmt = $bdd->prepare('
                 INSERT INTO user ( login, mdp, email)
                     VALUES (:login, :mdp, :email)');
             $stmt->bindValue(':login', $user['login'], PDO::PARAM_STR);
             $stmt->bindValue(':mdp', $user['mdp'], PDO::PARAM_STR);
             $stmt->bindValue(':email', $user['email'], PDO::PARAM_STR);
             
             $res =  $stmt->execute();
             if ($res){
                 $film['id'] = $bdd->lastInsertId();
                return true;
            }else {
                return false;
            }
        }
        
        
        public static function findByUser($login){
            $bdd = connectDB();
            $stmt = $bdd->prepare('SELECT * FROM utilisateur WHERE login = :login');
            $stmt->bindValue(':login', $login);
            $stmt->execute();
            $utilisateur = $stmt->fetch();
            
            return $utilisateur;
        }
    }*/


    /*//Ajouter un utilisateur 
    function addUser($email, $password)
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

    // Enregistre un nouvel utilisateur
    function register($email, $password)
    {
        // Récupération de l'utilisateur demandé
        $user = getUser($email);
        // Si l'utilisateur existe déjà, on arrête tout.
        if ($user) {
            die("L'utilisateur {$email} est déjà enregistré.");
        }

        // Enregistrement du nouvel utilisateur
        addUser($email, $password);
    }

    //Se connecter (utilisateur)
    function login($email, $password)
    {
        // Récupération de la l'utilisateur
        $user = getUser($email);

        // Si l'utilisateur n'a pas pu être récupéré.
        if (!array_key_exists($email, $users)) {
            die("L'utilisateur {$email} n'est pas enregistré.");
        }
    }*/
}
