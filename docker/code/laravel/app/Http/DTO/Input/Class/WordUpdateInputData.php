<?php

namespace App\Http\DTO\Input;

use App\Http\DTO\Input\WordUpdateInputCons;

class WordUpdateInputData implements WordUpdateInputCons {
    private $currentUserId;
    private $wordId;
    private $English;
    private $Japanese;

    public function __construct($currentUserId, $wordId, $English, $Japanese) {
        $this->currentUserId = $currentUserId;
        $this->wordId = $wordId;
        $this->English = $English;
        $this->Japanese = $Japanese;
    }

    public function getCurrentUserId() {
        return $this->currentUserId;
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
