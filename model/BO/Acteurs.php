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
class Acteurs
{

    private $_idActeur;
    private $_nom;
    private $_prenom;


    public function __construct($idActeur = null, $nom = null, $prenom = null)
    {
        $this->set_idActeur($idActeur);
        $this->set_nom($nom);
        $this->set_prenom($prenom);
    }

    // ajout des getters
    public function get_idActeur()
    {
        return $this->_idActeur;
    }

    public function get_nom()
    {
        return $this->_nom;
    }

    public function get_prenom()
    {
        return $this->_prenom;
    }


    // ajout des setters

    public function set_idActeur($_idActeur)
    {
        $this->_idActeur = $_idActeur;
    }

    public function set_nom($_nom)
    {
        $this->_nom = $_nom;
    }

    public function set_prenom($_prenom)
    {
        $this->_prenom = $_prenom;
    }
}
