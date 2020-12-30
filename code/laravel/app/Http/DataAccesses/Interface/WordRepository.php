<?php

namespace App\Http\DataAccesses;

use App\Http\UseCases\Entity\Word;

interface WordRepository {
    public function find(Word $word);
    public function save(Word $word);
    public function update(Word $word);
    public function delete(Word $word);
    public function getRandWord(Word $word);
    public function favoWord(Word $word);
}
