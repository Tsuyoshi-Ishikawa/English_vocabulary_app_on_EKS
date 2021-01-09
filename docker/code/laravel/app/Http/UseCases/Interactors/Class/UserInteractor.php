<?php

namespace App\Http\UseCases\Interactors;

use App\Http\UseCases\Interactors\UserUseCase;
use App\Http\DTO\Input\UserRegisterInputCons;
use App\Http\DTO\Input\UserLoginInputCons;
use App\Http\UseCases\Entity\User;
use App\Http\DTO\Output\UserRegisterOutputData;
use App\Http\DTO\Output\UserLoginOutputData;
use App\Http\DTO\Output\UserGetAllWordsOutputData;

class UserInteractor implements UserUseCase {
    public function register(UserRegisterInputCons $userInfo) {
        $user = new User();
        $user->register($userInfo->getName(), $userInfo->getEmail(), $userInfo->getPass());

        //DataAccessをDI
        app()->make('UserRepository')->save($user);

        return new UserRegisterOutputData($user);
    }

    public function login(UserLoginInputCons $userInfo) {
        $user = new User();
        $user->login($userInfo->getEmail(), $userInfo->getPass());

        //DataAccessをDI
        app()->make('UserRepository')->loginConfirm($user);

        return new UserLoginOutputData($user);
    }

    public function getAllWords(int $userId) {
        //DataAccessをDI
        $words = app()->make('UserRepository')->getAllWords($userId);
        return new UserGetAllWordsOutputData($words);
    }
}
