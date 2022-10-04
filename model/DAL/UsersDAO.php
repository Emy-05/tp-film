<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 
 */
class UsersDAO extends Dao
{
    //Fonction pour récupérer les informations des utilisateurs
    public function getAll($search)
    { //On définit la bdd 
        $query = $this->_bdd->prepare("SELECT idUser, userName, email, password FROM user");
        $query->execute();
        $user = array();

        while ($data = $query->fetch()) {
            $user[] = new Users($data['idUser'], $data['userName'], $data['email'], $data['password']);
        }
        return ($user);
    }

    public function getOne($idUser)
    {
        $query = $this->_bdd->prepare('SELECT * FROM user WHERE user.idUser = :idUser');
        $query->execute(array(':idUser' => $idUser));
        $data = $query->fetch();
        $user = new Users($data['idUser'], $data['userName'], $data['email'], $data['password']);
        return ($user);
    }


    //Ajouter un utilisateur
    public function add($data)
    { //Requete
        $valeurs = ['idUser' => $data->get_idUser(), 'userName' => $data->get_userName(), 'email' => $data->get_email(), 'password' => $data->get_password()];
        $requete = 'INSERT INTO user (idUser, userName, email, password) VALUES (:idUser , :userName , :email , :password)';
        $insert = $this->_bdd->prepare($requete);
        if (!$insert->execute($valeurs)) {
            return false;
        } else {
            return true;
        }
    }


    public function get_user($mail)
    {
        $query = $this->_bdd->prepare('SELECT * FROM user WHERE user.email = :email');
        $query->execute(array(':email' => $mail));
        $data = $query->fetch();
        if ($data) {
            $user = new Users($data['idUser'], $data['userName'], $data['email'], $data['password']);
        } else {
            $user = null;
        }
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
