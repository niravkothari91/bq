@if(!empty($options))
    <option>--- Select {{$text}} ---</option>
    @foreach($options as $key => $value)
        <option value="{{ $key }}">{{ $value }}</option>
    @endforeach
@endif