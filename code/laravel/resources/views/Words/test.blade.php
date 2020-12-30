@extends('layouts.app')

@section('title', 'Words test')

@section('content')
  @section('h3', '英単語テスト')
  <a href="{{route('Users.home') }}">戻る</a>
  <div class="text-center mx-auto">
    <p>{{ $rand_word->getEnglish() }}の訳はなんですか？</p>

    <p id="answer" style="display:none;">答えは{{ $rand_word->getJapanese() }}です</p>
    <button id="answer_btn">答えをみる</button>
    <a href="{{ url('/words/test') }}">次の問題へ</a>
  </div>
@endsection('content')
