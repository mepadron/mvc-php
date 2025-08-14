<?php
namespace App\Models;

class AuthUserModel
{
    private $emailBD = 'miguel@gmail.com';
    private $passwordBD = '123456';

    // public function __construct($emailBD, $passwordBD)
    // {
    //     $this->emailBD = $emailBD;
    //     $this->passwordBD = $passwordBD;
    // }

    public function getEmailBD()
    {
        return $this->emailBD;
    }

    public function getPasswordBD()
    {
        return $this->passwordBD;
    }

    public function setEmailBD($emailBD)
    {
        $this->emailBD = $emailBD;
    }

    public function setPasswordBD($passwordBD)
    {
        $this->passwordBD = $passwordBD;
    }

    public function login($email, $password)
    {
        if ($email == $this->emailBD && $password == $this->passwordBD) {
            return true;
        } else {
            return false;
        }
    }
}
