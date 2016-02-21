@extends('templates.admin')

@section('content')

<h1>Submissions</h1>

    @foreach ($response as $field)
        <h2>{{$field->name}}</h2>
            @if(is_array($field->value))
                @foreach($field->value as $value)
                    <p>{{$value}}</p>
                @endforeach
            @else
                <p>{{$field->value}}</p>
            @endif
    @endforeach
@stop