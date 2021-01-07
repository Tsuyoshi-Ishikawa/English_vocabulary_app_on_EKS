<?php

namespace App\Http\DTO\Input;

use App\Http\DTO\Input\WordStoreInputCons;

class WordStoreInputData implements WordStoreInputCons {
    private $currentUserId;
    private $English;
    private $Japanese;

    public function __construct($currentUserId, $English, $Japanese) {
        $this->currentUserId = $currentUserId;
        $this->English = $English;
        $this->Japanese = $Japanese;
    }

    public function getCurrentUserId() {
        return $this->currentUserId;
    }

    public function getEnglish() {
        return $this->English;
    }

    public function getJapanese() {
        return $this->Japanese;
    }
}
