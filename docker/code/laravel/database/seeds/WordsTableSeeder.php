<?php

use Illuminate\Database\Seeder;
use App\Word;

class WordsTableSeeder extends Seeder
{
    public function run()
    {
        $param = [
            'user_id' => '2',
            'English' => 'Lion',
            'Japanese' => 'ライオン' 
        ];
        $word = new Word;
        $word->fill($param)->save();

        $param = [
            'user_id' => '2',
            'English' => 'Bird',
            'Japanese' => 'とり' 
        ];
        $word = new Word;
        $word->fill($param)->save();

        $param = [
            'user_id' => '3',
            'English' => 'PC',
            'Japanese' => 'パソコン' 
        ];
        $word = new Word;
        $word->fill($param)->save();

        $param = [
            'user_id' => '3',
            'English' => 'iPhone',
            'Japanese' => 'アイフォン' 
        ];
        $word = new Word;
        $word->fill($param)->save();

        $param = [
            'user_id' => '4',
            'English' => 'Mr children',
            'Japanese' => 'ミスチル' 
        ];
        $word = new Word;
        $word->fill($param)->save();
    }
}
