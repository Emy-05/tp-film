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
        $query = $this->_bdd->prepare("SELECT idUser, userName, email, password FROM user WHERE password = :password");
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
        //var_dump($data);
        $valeurs = ['email' => $data->get_email(), 'password' => $data->get_password(), 'userName' => $data->get_userName(),];
        $requete = 'INSERT INTO user (email, password, userName) VALUES (:email , :password , :userName)';
        //var_dump($valeurs);
        $insert = $this->_bdd->prepare($requete);
        //var_dump($insert);
        if ($insert->execute($valeurs) == null) {
            return false;
        } else {
            return true;
        }
    }


    public function get_user($email)
    {
        $query = $this->_bdd->prepare('SELECT * FROM user WHERE email = :email');
        $query->execute(array(':email' => $email));
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
