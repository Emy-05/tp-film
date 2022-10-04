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
class FilmsDAO extends Dao
{

    //Récupérer tous les films
    public function getAll($search)
    {
        //On définit la bdd pour la fonction

        $query = $this->_bdd->prepare("SELECT films.idFilm, titre, realisateur, affiche, annee, idActeur, personnage, idRole FROM `films` INNER JOIN roles ON films.idFilm = roles.idFilm ");
        $query->execute();
        $movies = array(); // récupération des films dans un tableau $movies

        while ($data = $query->fetch()) {
            $movies[] = new Films($data['idFilm'], $data['titre'], $data['realisateur'], $data['affiche'], $data['annee'], $data['idActeur'], $data['personnage'], $data['idRole']);
        }
        return ($movies); // on retourne le tableau des films rempli des infos prises dans la bdd avec jointure de la bdd role
    }


    //Ajouter un film
    public function add($data)
    {

        $valeurs = ['titre' => $data->get_titre(), 'realisateur' => $data->get_realisateur(), 'affiche' => $data->get_affiche(), 'annee' => $data->get_annee(), 'personnage' => $data->get_personnage()];
        $requete = 'INSERT INTO films (titre, realisateur, affiche, annee) VALUES (:titre , :realisateur, :affiche, :annee)';
        $insert = $this->_bdd->prepare($requete);
        if (!$insert->execute($valeurs)) {
            //print_r($insert->errorInfo());
            return false;
        } else {
            return true;
        }
    }

    //Récupérer plus d'info sur 1 film
    public function getOne($id_movie)
    {

        $query = $this->_bdd->prepare('SELECT * FROM films WHERE films.idFilm = :idFilm')->fetch(PDO::FETCH_ASSOC);
        $query->execute(array(':idFilm' => $id_movie));
        $data = $query->fetch();
        $movie = new Films($data['titre'], $data['realisateur'], $data['affiche'], $data['annee'], $data['personnage']);
        return ($movie);
    }

    // supprimer 1 film grâce à son id
    public function deleteFilm($idMovie): int
    {
        $query = $this->_bdd->prepare('DELETE FROM films WHERE films.idFilm = :idMovie');
        $query->execute(array('idMovie' => $idMovie));
        return ($query->rowCount());
    }

    //Rajouter un rôle via Id du film
    public function add_role($role)
    {
        $query = $this->_bdd->prepare('INSERT INTO role WHERE  films.idFilm = role.idFilm');
        $query->execute(array('idFilm' => $role));
        return ($query->rowCount());
    }

    // supprimer 1 rôle grâce à son id
    public function deleteRole($idRole): int
    {
        $query = $this->_bdd->prepare('DELETE FROM role WHERE role.idRole = :idRole');
        $query->execute(array('idRole' => $idRole));
        return ($query->rowCount());
    }
}
