@extends('layouts.app')

@section('title',  $user->name)

@section('content')
  @section('h3', $user->name)
  <a href="{{route('Users.search') }}">戻る</a>

  <div class="w-50 mx-auto text-center mt-4">
        <a class="btn-sm btn-primary" href="">フォローする</a>
  </div>

  <div>
    <table border="1" class="table-stripped table-bordered mx-auto my-5 w-50 text-center">
    @forelse ($words as $word)
        <tr id="word_{{$word->id}}">
          <td>{{$word->English}}</td>
          <td>{{$word->Japanese}}</td>
        </tr>
    @empty
      <p class="text-center">no English Word</p>
    @endforelse
    </table>
  </div>
@endsection('content')
