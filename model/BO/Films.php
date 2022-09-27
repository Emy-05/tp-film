<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Films
 *
 * @author Vince
 */
class Films
{

    private $_idFilm;
    private $_titre;
    private $_realisateur;
    private $_affiche;
    private $_annee;

    private $_tabRoles = array();

    public function __construct($idFilm = null, $titre = null, $realisateur = null, $affiche = null, $annee = null, $tabRoles = [])
    {
        if (!is_null($idFilm)) {
            $this->set_idFilm($idFilm);
        }
        $this->set_titre($titre);
        $this->set_realisateur($realisateur);
        $this->set_affiche($affiche);
        $this->set_annee($annee);
        $this->set_tabRoles($tabRoles);
    }

    // ajout des getters

    public function get_titre()
    {
        return $this->_titre;
    }

    public function get_realisateur()
    {
        return $this->_realisateur;
    }

    public function get_affiche()
    {
        return $this->_affiche;
    }

    public function get_annee()
    {
        return $this->_annee;
    }

    public function get_tabRoles()
    {
        return $this->_tabRoles;
    }

    public function get_idFilm()
    {
        return $this->_idFilm;
    }

    // ajout des setters

    public function set_titre($_titre)
    {
        $this->_titre = $_titre;
    }

    public function set_realisateur($_realisateur)
    {
        $this->_realisateur = $_realisateur;
    }

    public function set_affiche($_affiche)
    {
        $this->_affiche = $_affiche;
    }

    public function set_annee($_annee)
    {
        $this->_annee = $_annee;
    }

    public function set_tabRoles($_tabRoles)
    {
        $this->_tabRoles = $_tabRoles;
    }

    public function set_idFilm($_idFilm)
    {
        $this->_idFilm = $_idFilm;
    }
}
