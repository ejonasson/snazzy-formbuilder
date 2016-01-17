@extends('templates.admin')

@section('content')
    <h1>Submissions</h1>
    
    @foreach($submissions as $submission)
        <h5>Submitted on {{$submission['submission_date']}} at {{$submission['submission_time']}}</h5>
        @foreach($submission as $question)
        @if(is_object($question))
            <h5><strong>Question:</strong> {{$question->name}}</h5>
            @if(is_array($question->value))
    
                @foreach($question->value as $value)
                    <p>{{$value}}</p>
                @endforeach
            @else
                <p><strong>Response:</strong> {{$question->value}}</p>
            @endif
        @endif
        @endforeach
        <hr>
    @endforeach

@stop