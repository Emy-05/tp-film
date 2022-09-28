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

    private $_id;
    private $_email;
    private $_password;

    public function __construct($id = null, $email = null, $password = null)
    {
        if (!is_null($id)) {
            $this->set_id($id);
        }
        $this->set_email($email);
        $this->set_password($password);
    }

    public function get_email()
    {
        return $this->_email;
    }

    public function get_password()
    {
        return $this->_password;
    }

    public function set_email($_email)
    {
        $this->_email = $_email;
    }

    public function set_password($_password)
    {
        $this->_password = $_password;
    }

    /**
     * Get the value of _id
     */
    public function get_id()
    {
        return $this->_id;
    }

    /**
     * Set the value of _id
     *
     */
    public function set_id($_id)
    {
        $this->_id = $_id;
    }
}
