@extends('templates.admin')


@section('title')
    {{$report->title}}
@stop

@section('content')

<h1>{{$report->title}}</h1>


@foreach($report->data as $fieldData)

    <h2> {{$fieldData->field->name}}</h2>
    <table class="table">
            <tr>
                <th>Field Name</th>
                <th>Value</th>
            </tr>
        @foreach($fieldData->data as $key => $value)
            <tr>
                <td>{{$value['name']}}</td>
                <td>{{$value['value']}}</td>
            </tr>
        @endforeach
    </table>
    <hr>
@endforeach
@if(empty($report->data))
    <p><em>No Results are available for this form.</em></p>
@endif

@stop

