<?php

namespace App\Http\UseCases\Interactors;

use App\Http\UseCases\Interactors\UserUseCase;
use App\Http\DTO\Input\UserRegisterInputCons;
use App\Http\DTO\Input\UserLoginInputCons;
use App\Http\UseCases\EntityDirector\UserDirector;
use App\Http\DataAccesses\EloquentUserRepository;
use App\Http\DTO\Output\UserRegisterOutputData;
use App\Http\DTO\Output\UserLoginOutputData;
use App\Http\DTO\Output\UserGetAllWordsOutputData;

class UserInteractor implements UserUseCase {
    public function register(UserRegisterInputCons $userInfo) {
        $userDirector = new UserDirector();
        $user = $userDirector->registerUser($userInfo);
        $eloquentUserRepository = new EloquentUserRepository();
        $eloquentUserRepository->save($user);
        return new UserRegisterOutputData($user);
    }

    public function login(UserLoginInputCons $userInfo) {
        $userDirector = new UserDirector();
        $user = $userDirector->loginUser($userInfo);
        $eloquentUserRepository = new EloquentUserRepository();
        $eloquentUserRepository->loginConfirm($user);
        return new UserLoginOutputData($user);
    }

    public function getAllWords(int $userId) {
        $eloquentUserRepository = new EloquentUserRepository();
        $words = $eloquentUserRepository->getAllWords($userId);
        return new UserGetAllWordsOutputData($words);
    }
}
