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
    public function getAll()
    {
        //On définit la bdd pour la fonction

        $query = $this->_bdd->prepare("SELECT id, title, description FROM films");
        $query->execute();
        $offers = array();

        while ($data = $query->fetch()) {
            $movies[] = new Films($data['id'], $data['title'], $data['description']);
        }
        return ($movies);
    }

    //Ajouter une film
    public function add($data)
    {

        $valeurs = ['title' => $data->get_title(), 'description' => $data->get_description()];
        $requete = 'INSERT INTO films (title, description) VALUES (:title , :description)';
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

        $query = $this->_bdd->prepare('SELECT * FROM films WHERE films.idFilm = :id_film')->fetch(PDO::FETCH_ASSOC);
        $query->execute(array(':id_film' => $id_movie));
        $data = $query->fetch();
        $movie = new Films($data['id'], $data['title'], $data['description']);
        return ($offer);
    }

    // supprimer 1 film grâce à son id
    public function deleteFilm($idMovie): int
    {
        $query = $this->_bdd->prepare('DELETE FROM films WHERE films.idFilm = :idFilm');
        $query->execute(array('idMovie' => $idMovie));
        return ($query->rowCount());
    }
}
