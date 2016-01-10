@extends('templates/base')

@section('content')
    <form method="POST" action="/forms/{{$form->id}}/submit" id="custom-form">
        {!! csrf_field() !!}    
        <h1>{{$form->name}} <small><a href="/forms/{{$form->id}}/edit">Edit</a></small></h1>
        <div class="form-description">
            {{$form->description}}
        </div>
        <div class="form-field">
            @foreach($form->fields as $field)
                {!! $field->view !!}
            @endforeach
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
@stop

@section('footer')
<script type="text/javascript" src="//cdn.jsdelivr.net/jquery.validation/1.14.0/jquery.validate.min.js"></script>
<script>$('#custom-form').validate();</script>
@stop