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

    private $idActeur;
    private $nom;
    private $prenom;


    public function __construct($idActeur = null, $nom = null, $prenom = null)
    {
        $this->set_idActeur($idActeur);
        $this->set_nom($nom);
        $this->set_prenom($prenom);
    }

    // ajout des getters
    public function get_idActeur()
    {
        return $this->idActeur;
    }

    public function get_nom()
    {
        return $this->nom;
    }

    public function get_prenom()
    {
        return $this->prenom;
    }


    // ajout des setters

    public function set_idActeur($idActeur)
    {
        $this->idActeur = $idActeur;
    }

    public function set_nom($nom)
    {
        $this->nom = $nom;
    }

    public function set_prenom($prenom)
    {
        $this->prenom = $prenom;
    }
}
