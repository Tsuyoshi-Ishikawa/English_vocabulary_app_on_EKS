<?php

namespace App\Http\DataAccesses;

use App\Http\UseCases\Entity\User;

interface UserRepository {
    public function save(User $user);
    public function loginConfirm(User $user);
    public function getAllWords(int $userId);
}
