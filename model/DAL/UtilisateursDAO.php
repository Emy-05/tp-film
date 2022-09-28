<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of films
 *
 * @author 1703728
 */
class UtilisateursDAO extends Dao
{

    //Récupérer tous les films
    public function getAll()
    {
        //On définit la bdd pour la fonction

        $query = $this->_bdd->prepare("SELECT idUser, email, password FROM utilisateurs");
        $query->execute();
        $users = array();

        while ($data = $query->fetch()) {
            $users[] = new Utilisateurs($data['id'], $data['email'], $data['password']);
        }
        return ($users);
    }

    //Ajouter une film
    public function add($data)
    {

        $valeurs = ['email' => $data->get_email(), 'password' => $data->get_password()];
        $requete = 'INSERT INTO utilisateurs (email, password) VALUES (:email , :password)';
        $insert = $this->_bdd->prepare($requete);
        if (!$insert->execute($valeurs)) {
            //print_r($insert->errorInfo());
            return false;
        } else {
            return true;
        }
    }

    //Récupérer plus d'info sur 1 film
    public function getOne($id_user)
    {

        $query = $this->_bdd->prepare('SELECT * FROM utilisateurs WHERE utilisateur.idUsers = :id_utilisateur')->fetch(PDO::FETCH_ASSOC);
        $query->execute(array(':id_utilisateur' => $id_user));
        $data = $query->fetch();
        $user = new Utilisateurs($data['id'], $data['email'], $data['password']);
        return ($user);
    }
}
