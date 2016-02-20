@extends('templates.admin')


@section('title')
    Report
@stop

@section('content')

<h1>Report</h1>


@foreach($data as $fieldData)

    <h2> {{$fieldData->field->name}}</h2>
    @foreach($fieldData->data as $key => $value)
        
        <h4>{{$value['name']}}: {{$value['value']}}</h4>
        
    @endforeach
        
    
@endforeach
@if(empty($data))
    <p><em>No Results are available for this form.</em></p>
@endif
@stop

