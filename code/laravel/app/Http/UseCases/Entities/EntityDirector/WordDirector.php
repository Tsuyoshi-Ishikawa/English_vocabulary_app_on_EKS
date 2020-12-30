<?php

namespace App\Http\UseCases\EntityDirector;

use App\Http\UseCases\Entity\Word;

class WordDirector {
    public function setCurrentUserId(int $id) {
        $word = new Word();
        $word->setCurrentUserId($id);
        return $word;
    }

    public function setWordId(int $id) {
        $word = new Word();
        $word->setWordId($id);
        return $word;
    }

    public function setValues($inputData) {
        $word = new Word();
        $word->setCurrentUserId($inputData->getCurrentUserId());
        $word->setEnglish($inputData->getEnglish());
        $word->setJapanese($inputData->getJapanese());
        return $word;
    }

    public function updateValues($inputData) {
        $word = new Word();
        $word->setWordId($inputData->getWordId());
        $word->setCurrentUserId($inputData->getCurrentUserId());
        $word->setEnglish($inputData->getEnglish());
        $word->setJapanese($inputData->getJapanese());
        return $word;
    }

    public function deleteValues($inputData) {
        $word = new Word();
        $word->setWordId($inputData->getWordId());
        $word->setCurrentUserId($inputData->getCurrentUserId());
        return $word;
    }

    public function favoWord($inputData) {
        $word = new Word();
        $word->setCurrentUserId($inputData->getCurrentUserId());
        $word->setWordId($inputData->getWordId());
        $word->setRequestType($inputData->getRequestType());
        return $word;
    }
}
