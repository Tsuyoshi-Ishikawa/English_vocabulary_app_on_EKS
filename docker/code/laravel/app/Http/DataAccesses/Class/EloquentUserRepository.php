<?php

namespace App\Http\DataAccesses;

use Illuminate\Support\Facades\Hash;
use App\Http\DataAccesses\UserRepository;
use App\Http\UseCases\Entity\User;
use App\User as UserORM;
use Exception;

class EloquentUserRepository implements UserRepository {
    public function save(User $user) {
        //validation
        $email = $user->getUserEmail();
        if ($modelUser = UserORM::where('email', $email)->first()) {
            $user->setError(new Exception('email should be unique'));
            return;
        }

        $UserORM = new UserORM;
        $UserORM->name = $user->getUserName();
        $UserORM->email = $email;
        $UserORM->password = Hash::make($user->getUserPass());
        $UserORM->save();
        $user->setUserId($UserORM->id);
    }

    public function loginConfirm(User $user) {
        if (empty($modelUser = UserORM::Where('email', $user->getUserEmail())->first())) {
            $user->setError(new Exception('email should be equal to account email'));
            return;
        }
        if (Hash::check($user->getUserPass(), $modelUser->password)) {
            $user->setUserId($modelUser->id);
        } else {
            $user->setError(new Exception('password should be equal to account password'));
        }
    }

    public function getAllWords(int $userId) {
        $user = UserORM::Where('id', $userId)->first();
        $words = $user->words;
        foreach ($user->favo_words as $favo_word) {
            $words[] = $favo_word;
        }
        return $words;
    }
}
