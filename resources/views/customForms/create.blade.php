@extends('templates/base')

@section('content')

<form method="POST" action="/forms">
    {!! csrf_field() !!}

    <div class="form-group">
        <label for="form_name">Form Name</label>
        <input class="form-control" type="text" name="form_name" value="{{ old('form_name') }}">
    </div>

    <div class="form-group">
        <label for="form_description">Form Description</label>
        <textarea class="form-control" name="form_description" id="" cols="30" rows="10"></textarea>
    </div>
    <div class="form-group">
        <button class="btn btn-primary" type="submit">Create</button>
    </div>
</form>

@stop