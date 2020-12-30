<?php

namespace App\Http\DTO\Input;

use App\Http\DTO\Input\UserRegisterInputCons;

class UserRegisterInputData implements UserRegisterInputCons {
    private $userName;
    private $userEmail;
    private $userPass;

    public function __construct($name, $email, $pass) {
        $this->userName = $name;
        $this->userEmail = $email;
        $this->userPass = $pass;
    }

    public function getName() {
        return $this->userName;
    }

    public function getEmail() {
        return $this->userEmail;
    }

    public function getPass() {
        return $this->userPass;
    }
}
