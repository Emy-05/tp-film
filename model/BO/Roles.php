<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Role
 *
 * @author Vince
 */
class Role
{
    private $_idActeur;
    private $_idFilm;
    private $_personnage;
    private $_idRole;


    public function __construct($idActeur = null, $idFilm = null, $personnage = null, $idRole = null)
    {
        $this->set_idActeur($idActeur);
        $this->set_idFilm($idFilm);
        $this->set_personnage($personnage);
        $this->set_idRole($idRole);
    }

    // ajout des getters

    public function get_idActeur()
    {
        return $this->_idActeur;
    }

    public function get_personnage()
    {
        return $this->_personnage;
    }

    public function get_idRole()
    {
        return $this->_idRole;
    }

    public function get_annee()
    {
        return $this->_annee;
    }

    public function get_idFilm()
    {
        return $this->_idFilm;
    }


    // ajout des setters

    public function set_idActeur($_idActeur)
    {
        $this->_idActeur = $_idActeur;
    }

    public function set_personnage($_personnage)
    {
        $this->_personnage = $_personnage;
    }

    public function set_idRole($_idRole)
    {
        $this->_idRole = $_idRole;
    }
    public function set_annee($_annee)
    {
        $this->_annee = $_annee;
    }

    public function set_idFilm($_idFilm)
    {
        $this->_idFilm = $_idFilm;
    }
}
