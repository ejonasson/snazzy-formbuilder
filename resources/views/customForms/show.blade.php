@extends('templates/base')

@section('content')
    <h1>{{$form->name}} <small><a href="/forms/{{$form->id}}/edit">Edit</a></small></h1>
    <div class="form-description">
        {{$form->description}}
    </div>
    @foreach($form->fields as $field)
        <div class="form-group">
            <label for="{{$field->id}}">{{$field->name}}</label>
            <input type="{{$field->type}}" name="{{$field->id}}" class="form-control">
        </div>
    @endforeach
@stop