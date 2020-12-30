<?php

namespace App\Http\DTO\Output;

use App\Http\DTO\Output\WordGetOutputCons;
use App\Http\UseCases\Entity\Word;

class WordGetOutputData implements WordGetOutputCons {
    private $wordId;
    private $English;
    private $Japanese;

    public function __construct(Word $word) {
        $this->wordId = $word->getWordId();
        $this->English = $word->getEnglish();
        $this->Japanese = $word->getJapanese();
    }

    public function getWordId() {
        return $this->wordId;
    }

    public function getEnglish() {
        return $this->English;
    }

    public function getJapanese() {
        return $this->Japanese;
    }
}
