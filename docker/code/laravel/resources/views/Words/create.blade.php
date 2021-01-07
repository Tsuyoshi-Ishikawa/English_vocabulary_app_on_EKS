@extends('layouts.app')

@section('title', 'Create Word')

@section('content')
  @section('h3', '英単語登録')
  @include('layouts.wordform', ['url' => url('/words'), 'method' => 'POST', 'En_input_Value' => old('English'), 'Ja_input_Value' => old('Japanese'), 'submit_value' => "登録"])
@endsection('content')