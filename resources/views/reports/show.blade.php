@extends('templates.admin')


@section('title')
    Report
@stop

@section('content')

<h1>It Works!</h1>


@foreach($data as $fieldData)
    
    <h2> {{$fieldData->field->name}}</h2>
    @foreach($fieldData->data as $key => $value)
        
        <h4>{{$value['name']}}: {{$value['count']}}</h4>
        
    @endforeach
@endforeach


@stop

