<?php

namespace App\Http\DTO\Input;

interface WordFavoInputCons {
    public function getCurrentUserId();
    public function getRequestType();
    public function getWordId();
}
