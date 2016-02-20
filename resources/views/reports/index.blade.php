@extends('templates.admin')

@section('title')
    Reports
@stop

@section('content')
    <h1>Reports</h1>
    
    <hr>

    <h2>Pre-made Reports</h2>
        @foreach($forms as $form)
            <h3>{{$form->name}}</h3>
            <ul>
                <li>
                    <a href="{{url("/reports/form/{$form->id}/overview")}}">Overview</a>
                </li>
            </ul>
        @endforeach
    <ul>
        
    </ul>

    <hr>

    <h2>Custom Reports</h2>

    <p><em>This feature coming soon</em></p>

@stop