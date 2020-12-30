@extends('layouts.app')

@section('title', 'Edit Word')

@section('content')
  @section('h3', '英単語編集')
  @include('layouts.wordform', ['url' => route('Words.update',  ['id' => $word->getWordId()]), 'method' => 'PUT','En_input_Value' => old('English', $word->getEnglish()), 'Ja_input_Value' => old('Japanese', $word->getJapanese()), 'submit_value' => "編集登録"])
@endsection('content')
