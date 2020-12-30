<?php

namespace App\Http\UseCases\Interactors;

use App\Http\DTO\Input\UserRegisterInputCons;
use App\Http\DTO\Input\UserLoginInputCons;

interface UserUseCase {
    public function register(UserRegisterInputCons $inputData);
    public function login(UserLoginInputCons $inputData);
    public function getAllWords(int $userId);
}
