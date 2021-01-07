<?php

namespace App\Http\UseCases\EntityDirector;

use App\Http\UseCases\Entity\User;

class UserDirector {
    public function registerUser($userInfo) {
        $user = new User();
        $user->setUserName($userInfo->getName());
        $user->setUserEmail($userInfo->getEmail());
        $user->setUserPass($userInfo->getPass());
        return $user;
    }

    public function loginUser($userInfo) {
        $user = new User();
        $user->setUserEmail($userInfo->getEmail());
        $user->setUserPass($userInfo->getPass());
        return $user;
    }
}
