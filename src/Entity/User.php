<?php

namespace App\Entity;

class User {

    protected $name;
    protected $email;

    public function getName()
    {
        return $this->name;
    }

    function setName($name)
    {
        $this->name = $name;
    }

    public function getEmail()
    {
        return $this->email;
    }

    function setEmail($email)
    {
        $this->email = $email;
    }
}