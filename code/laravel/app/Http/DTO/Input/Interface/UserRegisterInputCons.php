<?php

namespace App\Http\DTO\Input;

interface UserRegisterInputCons {
    public function getName();
    public function getEmail();
    public function getPass();
}
