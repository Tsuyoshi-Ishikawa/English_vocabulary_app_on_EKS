<?php

namespace App\Http\UseCases\Interactors;

use App\Http\UseCases\Interactors\WordUseCase;
use App\Http\DTO\Input\WordStoreInputCons;
use App\Http\DTO\Input\WordUpdateInputCons;
use App\Http\DTO\Input\WordDeleteInputCons;
use App\Http\DTO\Input\WordFavoInputCons;
use App\Http\UseCases\EntityDirector\WordDirector;
use App\Http\DataAccesses\EloquentWordRepository;
use App\Http\DTO\Output\WordGetOutputData;
use App\Http\DTO\Output\WordDeleteOutputData;
use App\Http\DTO\Output\WordRandOutputData;
use App\Http\DTO\Output\WordOtherOutputData;

class WordInteractor implements WordUseCase {
    public function getWord(int $id) {
        $wordDirector = new WordDirector();
        $word = $wordDirector->setWordId($id);
        $eloquentWordRepository = new EloquentWordRepository();
        $eloquentWordRepository->find($word);
        return new WordGetOutputData($word);
    }

    public function setValues(WordStoreInputCons $inputData) {
        $wordDirector = new WordDirector();
        $word = $wordDirector->setValues($inputData);
        $eloquentWordRepository = new EloquentWordRepository();
        $eloquentWordRepository->save($word);
    }

    public function updateValues(WordUpdateInputCons $inputData) {
        $wordDirector = new WordDirector();
        $word = $wordDirector->updateValues($inputData);
        $eloquentWordRepository = new EloquentWordRepository();
        $eloquentWordRepository->update($word);
    }

    public function deleteValues(WordDeleteInputCons $inputData) {
        $wordDirector = new WordDirector();
        $word = $wordDirector->deleteValues($inputData);
        $eloquentWordRepository = new EloquentWordRepository();
        $eloquentWordRepository->delete($word);
        return new WordDeleteOutputData($word);
    }

    public function getRandWord(int $currentUserId) {
        $wordDirector = new WordDirector();
        $word = $wordDirector->setCurrentUserId($currentUserId);
        $eloquentWordRepository = new EloquentWordRepository();
        $eloquentWordRepository->getRandWord($word);
        return new WordRandOutputData($word);
    }

    public function getOtherWord(int $currentUserId) {
        $wordDirector = new WordDirector();
        $word = $wordDirector->setCurrentUserId($currentUserId);
        $eloquentWordRepository = new EloquentWordRepository();
        $eloquentWordRepository->getOtherWord($word);
        return new WordOtherOutputData($word);
    }

    public function favoWord(WordFavoInputCons $inputData) {
        $wordDirector = new WordDirector();
        $word = $wordDirector->favoWord($inputData);
        $eloquentWordRepository = new EloquentWordRepository();
        $eloquentWordRepository->favoWord($word);
    }
}
