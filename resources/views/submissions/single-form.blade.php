@extends('templates.admin')

@section('content')
    <h1>Submissions</h1>

    @foreach($submissions as $submission)
        <table class="table table-striped">
            <tr>
                <td>
                    Submitted on {{$submission['submission_date']}} at {{$submission['submission_time']}}
                </td>
            </tr>
        @foreach($submission as $question)
            <tr>
                @if(is_object($question))
                    <td>{{$question->name}}</td>
                    @if(is_array($question->value))
                            <td>
                                @foreach($question->value as $value)
                                    {{$value}}
                                @endforeach
                            </td>
                    @else
                        <td>{{$question->value}}</td>
                    @endif
                @endif
            </tr>
        @endforeach
        </table>

        <hr>
    @endforeach

@stop