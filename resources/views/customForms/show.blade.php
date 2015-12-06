@extends('templates/base')

@section('content')
    <form method="POST" action="/forms/{{$form->id}}/submit">
        {!! csrf_field() !!}    
        <h1>{{$form->name}} <small><a href="/forms/{{$form->id}}/edit">Edit</a></small></h1>
        <div class="form-description">
            {{$form->description}}
        </div>
        <div class="form-field">
            @include('customForms.partials._render-field')
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
@stop