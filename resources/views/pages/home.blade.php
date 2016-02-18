@extends('templates.admin')

@section('title')
    Snazzy Forms
@stop

@section('content')

<h1>A Snazzy Form Builder App</h1>

<p>This app can be used to quickly create forms and collect responses.</p>

<a href="/auth/register" class="btn btn-primary">Register a new account</a>
<a href="/auth/login" class="btn btn-default">Login</a>

@stop