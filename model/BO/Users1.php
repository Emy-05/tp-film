<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of User
 *
 * @author Vince
 */
class User
{
    private $_idUser;
    private $_userName;
    private $_email;
    private $_password;


    public function __construct($idUser = null, $userName = null, $email = null, $password = null)
    {
        $this->set_idUser($idUser);
        $this->set_userName($userName);
        $this->set_email($email);
        $this->set_password($password);
    }

    // ajout des getters

    public function get_idUser()
    {
        return $this->_idUser;
    }

    public function get_userName()
    {
        return $this->_userName;
    }

    public function get_email()
    {
        return $this->_email;
    }

    public function get_password()
    {
        return $this->_password;
    }


    // ajout des setters

    public function set_idUser($_idUser)
    {
        $this->_idUser = $_idUser;
    }

    public function set_userName($_userName)
    {
        $this->_userName = $_userName;
    }

    public function set_email($_email)
    {
        $this->_email = $_email;
    }

    public function set_password($_password)
    {
        $this->_password = $_password;
    }
}