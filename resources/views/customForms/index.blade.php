@extends('templates/base')

@section('content')
    <h1>Forms Created</h2>
    @foreach($forms as $form)
        <h2><a href="/forms/{{$form->id}}">{{$form->name}}</a></h2>
        <div class="form-description">
            {{$form->description}}
        </div>
    @endforeach
@stop