<?php

namespace App\Http\DTO\Input;

use App\Http\DTO\Input\WordDeleteInputCons;

class WordDeleteInputData implements WordDeleteInputCons {
    private $currentUserId;
    private $wordId;

    public function __construct($currentUserId, $wordId) {
        $this->currentUserId = $currentUserId;
        $this->wordId = $wordId;
    }

    public function getCurrentUserId() {
        return $this->currentUserId;
    }

    public function getWordId() {
        return $this->wordId;
    }
}
