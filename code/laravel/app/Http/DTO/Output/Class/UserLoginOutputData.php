<?php

namespace App\Http\DTO\Output;

use App\Http\DTO\Output\UserLoginOutputCons;
use App\Http\UseCases\Entity\User;

class UserLoginOutputData implements UserLoginOutputCons {
    private $userId;
    private $error;

    public function __construct(User $user) {
        $this->userId = $user->getUserId();
        $this->error = $user->getError();
    }

    public function getId() {
        return $this->userId;
    }

    public function getError() {
        return $this->error;
    }

}
