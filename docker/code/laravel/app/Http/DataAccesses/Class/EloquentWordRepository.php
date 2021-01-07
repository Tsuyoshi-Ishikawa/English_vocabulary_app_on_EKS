<?php

namespace App\Http\DataAccesses;

use App\Http\DataAccesses\WordRepository;
use App\Http\UseCases\Entity\Word;
use App\Word as WordORM;
use App\User as UserORM;
use Exception;

class EloquentWordRepository implements WordRepository {
    public function find(Word $word) {
        $wordORM = WordORM::Where('id', $word->getWordId())->first();
        $word->setWordId($wordORM->id);
        $word->setEnglish($wordORM->English);
        $word->setJapanese($wordORM->Japanese);
    }

    public function save(Word $word) {
        $wordORM = new WordORM;
        $wordORM->English = $word->getEnglish();
        $wordORM->Japanese = $word->getJapanese();
        $currentUser = UserORM::Where('id', $word->getCurrentUserId())->first();
        $currentUser->words()->save($wordORM);
    }

    public function update(Word $word) {
        $wordORM = WordORM::Where('id', $word->getWordId())->first();
        $wordORM->English = $word->getEnglish();
        $wordORM->Japanese = $word->getJapanese();
        $currentUser = UserORM::Where('id', $word->getCurrentUserId())->first();
        $currentUser->words()->save($wordORM);
    }

    public function delete(Word $word) {
        $currentUser = UserORM::Where('id', $word->getCurrentUserId())->first();
        if (!(in_array($word->getWordId(), $currentUser->WordIds()))) {
            header("Content-Type: application/json; charset=UTF-8");
            $data = [
                'failedMsg' => 'word should be yours'
            ];
            echo json_encode($data); //header()とjson_encode()の処理でjsonを返すようになる
            exit; //exitはこれ以上phpの処理が必要ないから行う、
        }
        $wordORM = WordORM::Where('id', $word->getWordId())->first();
        $wordORM->delete();
    }

    public function getRandWord(Word $word) {
        $currentUser = UserORM::Where('id', $word->getCurrentUserId())->first();
        $test_words = $currentUser->words;
        $favo_words = $currentUser->favo_words;
        if (empty($test_words->count())) {
            $word->setError(new Exception('you should have words'));
            return;
        }
        foreach ($favo_words as $favo_word) {
            $test_words[] = $favo_word;
        }
        $wordCount = $test_words->count();
        $rand = rand(0, $wordCount-1);
        $word->setEnglish($test_words[$rand]->English);
        $word->setJapanese($test_words[$rand]->Japanese);
    }

    public function getOtherWord(Word $wordEntity) {
        $currentUser = UserORM::Where('id', $wordEntity->getCurrentUserId())->first();
        $word_ids = [];
        foreach ($currentUser->words as $word) {
            $word_ids[] = $word->id;
        }
        foreach ($currentUser->favo_words as $favo_word) {
            $word_ids[] = $favo_word->id;
        }
        $otherWords = WordORM::whereNotIn('id', $word_ids)->orderBy('id', 'desc')->get();
        foreach ($otherWords as $otherWord) {
            $array = array(
                'id' => $otherWord->id,
                'English' => $otherWord->English,
                'Japanese' => $otherWord->Japanese
            );
            $wordEntity->setOtherWords($array);
        }
    }

    public function favoWord(Word $word) {
        $currentUser = UserORM::Where('id', $word->getCurrentUserId())->first();
        if (in_array($word->getWordId(), $currentUser->WordIds())) {
            header("Content-Type: application/json; charset=UTF-8");
            $data = [
                'failedMsg' => 'word should be not yours'
            ];
            echo json_encode($data); //header()とjson_encode()の処理でjsonを返すようになる
            exit; //exitはこれ以上phpの処理が必要ないから行う、
        }
        if ($word->getRequestType() === 'add' ) {
            $currentUser->favo_words()->attach($word->getWordId());
        } elseif ($word->getRequestType() === 'remove') {
            $currentUser->favo_words()->detach($word->getWordId());
        } else {
            header("Content-Type: application/json; charset=UTF-8");
            $data = [
                'failedMsg' => 'Request is not correct'
            ];
            echo json_encode($data); //header()とjson_encode()の処理でjsonを返すようになる
            exit; //exitはこれ以上phpの処理が必要ないから行う、
        }
    }
}

