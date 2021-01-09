<?php

namespace App\Http\UseCases\Entity;

class Word {
    private $wordId;
    private $currentUserId;
    private $English;
    private $Japanese;
    private $OtherWords;
    private $RequestType;
    private $error;

    public function getWordId() {
        return $this->wordId;
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

    public function getOtherWords() {
        return $this->OtherWords;
    }

    public function getRequestType() {
        return $this->RequestType;
    }

    public function getError() {
        return $this->error;
    }

    public function setWordId($wordId) {
        $this->wordId = $wordId;
    }

    public function setCurrentUserId($currentUserId) {
        $this->currentUserId = $currentUserId;
    }

    public function setEnglish($English) {
        $this->English = $English;
    }

    public function setJapanese($Japanese) {
        $this->Japanese = $Japanese;
    }

    public function setOtherWords($OtherWord) {
        if (is_null($this->OtherWords)) {
            $this->OtherWords[0] = $OtherWord;
            return;
        }
        $this->OtherWords[count($this->OtherWords)] = $OtherWord;
    }

    public function setRequestType($RequestType) {
        $this->RequestType = $RequestType;
    }

    public function setError($error) {
        $this->error = $error;
    }

    public function setValues($user_id, $English, $Japanese) {
        $this->setCurrentUserId($user_id);
        $this->setEnglish($English);
        $this->setJapanese($Japanese);
    }

    public function updateValues($word_id, $user_id, $English, $Japanese) {
        $this->setWordId($word_id);
        $this->setCurrentUserId($user_id);
        $this->setEnglish($English);
        $this->setJapanese($Japanese);
    }

    public function deleteValues($word_id, $user_id) {
        $this->setWordId($word_id);
        $this->setCurrentUserId($user_id);
    }

    public function favoWord($user_id, $word_id, $request_type) {
        $this->setCurrentUserId($user_id);
        $this->setWordId($word_id);
        $this->setRequestType($request_type);
    }
}
