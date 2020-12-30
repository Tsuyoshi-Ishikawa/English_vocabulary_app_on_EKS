<?php

namespace App\Http\UseCases\Interactors;

use Illuminate\Http\Request;
use App\Http\DTO\Input\WordStoreInputCons;
use App\Http\DTO\Input\WordUpdateInputCons;
use App\Http\DTO\Input\WordDeleteInputCons;
use App\Http\DTO\Input\WordFavoInputCons;

interface WordUseCase {
    public function getWord(int $id);
    public function setValues(WordStoreInputCons $inputData);
    public function updateValues(WordUpdateInputCons $inputData);
    public function deleteValues(WordDeleteInputCons $inputData);
    public function getRandWord(int $currentUserId);
    public function getOtherWord(int $currentUserId);
    public function favoWord(WordFavoInputCons $inputData);
}
