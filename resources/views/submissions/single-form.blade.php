<h1>Submissions</h1>

@foreach($submissions as $submission)
    <h5>Submitted on {{$submission['submission_date']}} at {{$submission['submission_time']}}</h5>
    @foreach($submission as $question)
    @if(is_object($question))
        <h5>{{$question->name}}</h5>
        <p>{{$question->value}}</p>
    @endif
    @endforeach
@endforeach
