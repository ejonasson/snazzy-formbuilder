@extends('templates.admin')

@section('title')
    Reports for {{$form->name}}
@stop

@section('content')

    <h1>Reports Available for {{$form->name}}</h1>
    <hr>
    <h2>Pre-made Reports</h2>
    @include('reports.partials._premade-reports')
    <hr>
    <h2>Custom Reports</h2>
    <p><em>This feature coming soon</em></p>

@stop