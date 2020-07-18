<?php

namespace App\User;

class Users
{

    private $id;
    private $username;
    private $password;

    public function getID(): int
    {
        return $this->id;
    }

    public function getUsername(): string
    {
        return $this->username;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

}