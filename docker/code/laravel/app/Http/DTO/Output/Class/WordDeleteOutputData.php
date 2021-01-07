<?php

namespace App\Http\DTO\Output;

use App\Http\DTO\Output\WordDeleteOutputCons;
use App\Http\UseCases\Entity\Word;

class WordDeleteOutputData implements WordDeleteOutputCons {
    private $error;

    public function __construct(Word $word) {
        $this->error = $word->getError();
    }

    public function getError() {
        return $this->error;
    }
}
