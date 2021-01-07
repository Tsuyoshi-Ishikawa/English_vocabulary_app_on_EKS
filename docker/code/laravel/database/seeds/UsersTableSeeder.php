<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    
    public function run()
    {
        $param = [
            'id' => '1',
            'name' => 'ishikawa',
            'email' => 'test@test.com',
            'password' => Hash::make('ishikawapass') 
        ];
        $user = new User;
        $user->fill($param)->save();

        $param = [
            'id' => '2',
            'name' => 'yamamoto',
            'email' => 'test2@test.com',
            'password' => Hash::make('yamamotopass') 
        ];
        $user = new User;
        $user->fill($param)->save();

        $param = [
            'id' => '3',
            'name' => 'yamada',
            'email' => 'test3@test.com',
            'password' => Hash::make('yamadapass')
        ];
        $user = new User;
        $user->fill($param)->save();

        $param = [
            'id' => '4',
            'name' => 'yamashita',
            'email' => 'test4@test.com',
            'password' => Hash::make('yamashitapass')
        ];
        $user = new User;
        $user->fill($param)->save();
    }
}
