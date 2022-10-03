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
class Users
{

    private $idUser;
    private $userName;
    private $email;
    private $password;

    public function __construct($idUser = null, $userName = null, $email = null, $password = null)
    {
        if (!is_null($idUser)) {
            $this->set_idUser($idUser);
        }

        $this->set_idUser($idUser);
        $this->set_userName($userName);
        $this->set_email($email);
        $this->set_password($password);
    }

    public function get_idUser()
    {
        return $this->idUser;
    }

    public function get_userName()
    {
        return $this->userName;
    }

    public function get_email()
    {
        return $this->email;
    }

    public function get_password()
    {
        return $this->password;
    }

    // ajout des setters

    public function set_idUser($idUser)
    {
        $this->idUser = $idUser;
    }

    public function set_userName($userName)
    {
        $this->userName = $userName;
    }
    public function set_email($email)

    {
        $this->email = $email;
    }

    public function set_password($password)
    {
        $this->password = $password;
    }
}
