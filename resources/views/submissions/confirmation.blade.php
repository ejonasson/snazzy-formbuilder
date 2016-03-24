@extends('templates.public')

@section('content')
    @if(!empty($form->confirmation_message))
        <p>{{ $form->confirmation_message }}</p>
    @else
        <p>Your submission has been received</p>
    @endif
@stop