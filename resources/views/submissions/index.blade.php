@extends('templates.admin')

@section('content')

    <h1>Forms with Submissions</h1>

    @foreach ($forms as $form)
        <h2>
            <a href="{{url('form/' . $form->id . '/submissions')}}">
                {{$form->name}}
            </a>
        </h2>
        <p>{{$form->submissions->count()}} Submissions</p>
    @endforeach

@stop