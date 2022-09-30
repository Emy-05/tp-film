<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Acteurs
 *
 * @author 1703728
 */
class RolesDAO extends Dao
{

    //Récupérer tous les roles
    public function getAll()
    {
        //On définit la bdd pour la fonction

        $query = $this->_bdd->prepare("SELECT idActeur, idFilm, personnage, idRole FROM role");
        $query->execute();
        $roles = array(); // récupération des rôles dans un tableau $rôles

        while ($data = $query->fetch()) {
            $roles[] = new Roles($data['idActeur'], $data['idFilm'], $data['personnage'], $data['idRole']);
        }
        return ($roles); // on retourne le tableau des rôles rempli des infos prises dans la bdd
    }


    //Ajouter un rôle grâce à son personnage
    public function add($data)
    {

        $valeurs = ['nom' => $data->get_nom(), 'prenom' => $data->get_prenom()];
        $requete = 'INSERT INTO acteurs (nom, prenom) VALUES (:idActeur , :nom, :prenom)';
        $insert = $this->_bdd->prepare($requete);
        if (!$insert->execute($valeurs)) {
            //print_r($insert->errorInfo());
            return false;
        } else {
            return true;
        }
    }

    //Récupérer plus d'info sur 1 rôle
    public function getOne($id_actor)
    {

        $query = $this->_bdd->prepare('SELECT * FROM role WHERE idActeur = :idActeur')->fetch(PDO::FETCH_ASSOC);
        $query->execute(array(':idActeur' => $id_actor));
        $data = $query->fetch();
        $actor = new Acteurs($data['idActeur'], $data['nom'], $data['prenom']);
        return ($actor);
    }

    // supprimer 1 acteur grâce à son id
    public function deleteActor($idactor): int
    {
        $query = $this->_bdd->prepare('DELETE FROM acteurs WHERE idActeur = :idActeur');
        $query->execute(array('idActeur' => $idactor));
        return ($query->rowCount());
    }
}
