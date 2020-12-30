<a href="{{route('Users.home') }}">戻る</a>
<form action="{{ $url }}" method="post" class="text-center mx-auto">
@method($method)
  @csrf
  @error ("English")
  <p>{{ $message }}</p>
  @enderror
  <p>
    英語
  </p>
  <p>
    <input type="text" name="English" id="" value = "{{ $En_input_Value }}">
  </p>
  @error ("Japanese")
  <p>{{ $message }}</p>
  @enderror
  <p>
    日本語
  </p>
  <p>
    <input type="text" name="Japanese" id="" value = "{{ $Ja_input_Value }}">
  </p>

<input type="submit" value="{{$submit_value}}">
</form>