<?php

namespace App\Http\DTO\Input;

use App\Http\DTO\Input\WordFavoInputCons;

class WordFavoInputData implements WordFavoInputCons {
    private $CurrentUserId;
    private $RequestType;
    private $WordId;

    public function __construct($currentUserId, $RequestType, $WordId) {
        $this->CurrentUserId = $currentUserId;
        $this->RequestType = $RequestType;
        $this->WordId = $WordId;
    }

    public function getCurrentUserId() {
        return $this->CurrentUserId;
    }

    public function getRequestType() {
        return $this->RequestType;
    }

    public function getWordId() {
        return $this->WordId;
    }
}
