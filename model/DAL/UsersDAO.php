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
}
