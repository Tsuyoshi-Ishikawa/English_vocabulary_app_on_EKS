<?php

namespace App\Http\DTO\Output;

use App\Http\DTO\Output\WordRandOutputCons;
use App\Http\UseCases\Entity\Word;

class WordRandOutputData implements WordRandOutputCons {
    private $English;
    private $Japanese;
    private $error;

    public function __construct(Word $word) {
        $this->English = $word->getEnglish();
        $this->Japanese = $word->getJapanese();
        $this->error = $word->getError();
    }

    public function getEnglish() {
        return $this->English;
    }

    public function getJapanese() {
        return $this->Japanese;
    }

    public function getError() {
        return $this->error;
    }
}
