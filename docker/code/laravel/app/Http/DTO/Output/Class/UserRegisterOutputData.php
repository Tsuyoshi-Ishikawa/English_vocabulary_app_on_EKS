<?php

namespace App\Http\DTO\Output;

use App\Http\DTO\Output\UserRegisterOutputCons;
use App\Http\UseCases\Entity\User;

class UserRegisterOutputData implements UserRegisterOutputCons {
    private $userId;
    private $error;

    public function __construct(User $user) {
        $this->userId = $user->getUserId();
        $this->error = $user->getError();
    }

    public function getError() {
        return $this->error;
    }

    public function getId() {
        return $this->userId;
    }
}
