@extends('templates/base')

@section('content')

<h1>Submissions</h1>
{{-- {{dd($response)}} --}}
    @foreach ($response as $field)
        <h2>{{$field->name}}</h2>
        <p>{{$field->value}}</p>
    @endforeach
@stop