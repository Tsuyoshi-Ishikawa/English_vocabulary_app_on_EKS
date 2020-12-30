<?php

namespace App\Http\DTO\Input;

use App\Http\DTO\Input\UserLoginInputCons;

class UserLoginInputData implements UserLoginInputCons {
    private $userEmail;
    private $userPass;

    public function __construct($email, $pass) {
        $this->userEmail = $email;
        $this->userPass = $pass;
    }

    public function getEmail() {
        return $this->userEmail;
    }

    public function getPass() {
        return $this->userPass;
    }
}
