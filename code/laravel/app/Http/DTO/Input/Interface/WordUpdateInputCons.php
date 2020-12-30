<?php

namespace App\Http\DTO\Input;

interface WordUpdateInputCons {
    public function getCurrentUserId();
    public function getWordId();
    public function getEnglish();
    public function getJapanese();
}
