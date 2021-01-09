<?php

namespace App\Http\UseCases\Interactors;

use App\Http\UseCases\Interactors\WordUseCase;
use App\Http\DTO\Input\WordStoreInputCons;
use App\Http\DTO\Input\WordUpdateInputCons;
use App\Http\DTO\Input\WordDeleteInputCons;
use App\Http\DTO\Input\WordFavoInputCons;
use App\Http\UseCases\Entity\Word;
use App\Http\DTO\Output\WordGetOutputData;
use App\Http\DTO\Output\WordDeleteOutputData;
use App\Http\DTO\Output\WordRandOutputData;
use App\Http\DTO\Output\WordOtherOutputData;

class WordInteractor implements WordUseCase {
    public function getWord(int $id) {
        $word = new Word();
        $word->setWordId($id);

        //DataAccessをDI
        app()->make('WordRepository')->find($word);

        return new WordGetOutputData($word);
    }

    public function setValues(WordStoreInputCons $inputData) {
        $word = new Word();
        $word->setValues($inputData->getCurrentUserId(), $inputData->getEnglish(), $inputData->getJapanese());

        //DataAccessをDI
        app()->make('WordRepository')->save($word);
    }

    public function updateValues(WordUpdateInputCons $inputData) {
        $word = new Word();
        $word->updateValues($inputData->getWordId(), $inputData->getCurrentUserId(), $inputData->getEnglish(), $inputData->getJapanese());

        //DataAccessをDI
        app()->make('WordRepository')->update($word);
    }

    public function deleteValues(WordDeleteInputCons $inputData) {
        $word = new Word();
        $word->deleteValues($inputData->getWordId(), $inputData->getCurrentUserId());

        //DataAccessをDI
        app()->make('WordRepository')->delete($word);

        return new WordDeleteOutputData($word);
    }

    public function getRandWord(int $currentUserId) {
        $word = new Word();
        $word->setCurrentUserId($currentUserId);

        //DataAccessをDI
        app()->make('WordRepository')->getRandWord($word);

        return new WordRandOutputData($word);
    }

    public function getOtherWord(int $currentUserId) {
        $word = new Word();
        $word->setCurrentUserId($currentUserId);

        //DataAccessをDI
        app()->make('WordRepository')->getOtherWord($word);

        return new WordOtherOutputData($word);
    }

    public function favoWord(WordFavoInputCons $inputData) {
        $word = new Word();
        $word->favoWord($inputData->getCurrentUserId(), $inputData->getWordId(), $inputData->getRequestType());

        //DataAccessをDI
        app()->make('WordRepository')->favoWord($word);
    }
}
