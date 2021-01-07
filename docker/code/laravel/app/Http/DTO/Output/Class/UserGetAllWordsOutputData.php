<?php

namespace App\Http\DTO\Output;

use App\Http\DTO\Output\UserGetAllWordsOutputCons;

class UserGetAllWordsOutputData implements UserGetAllWordsOutputCons {
    private $words;

    public function __construct($words) {
        $this->words = $words;
    }

    public function getAllWords() {
        return $this->words;
    }
}
