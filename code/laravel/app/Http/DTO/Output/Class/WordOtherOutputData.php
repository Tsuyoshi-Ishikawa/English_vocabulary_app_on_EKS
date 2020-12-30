<?php

namespace App\Http\DTO\Output;

use App\Http\DTO\Output\WordOtherOutputCons;
use App\Http\UseCases\Entity\Word;

class WordOtherOutputData implements WordOtherOutputCons {
    private $otherWords;

    public function __construct(Word $word) {
        $this->otherWords = $word->getOtherWords();
    }

    public function getOtherWords() {
        return $this->otherWords;
    }
}
