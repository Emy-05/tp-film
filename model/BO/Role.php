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
class Roles
{
    private $idActeur;
    private $personnage;
    private $idRole;


    public function __construct($idActeur = null, $personnage = null, $idRole = null)
    {
        $this->set_idActeur($idActeur);
        $this->set_personnage($personnage);
        $this->set_idRole($idRole);
    }

    // ajout des getters

    public function get_idActeur()
    {
        return $this->idActeur;
    }

    public function get_personnage()
    {
        return $this->personnage;
    }

    public function get_idRole()
    {
        return $this->idRole;
    }



    // ajout des setters

    public function set_idActeur($idActeur)
    {
        $this->idActeur = $idActeur;
    }

    public function set_personnage($personnage)
    {
        $this->personnage = $personnage;
    }

    public function set_idRole($idRole)
    {
        $this->idRole = $idRole;
    }
}
