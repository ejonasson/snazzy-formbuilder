

@extends('templates.admin')

@section('title')
    Edit {{$form->name}}
@stop

@section('head')
    <meta name="csrf-token" content="{{csrf_token()}}">
@stop

@section('content')
<div class="edit-form-content">
    <h1>Edit</h1>   
    {!! Form::model($form, ['method' => 'PATCH', 'action' => ['Form\FormController@update'  , $form->id]]) !!}
    {!! csrf_field() !!}
    
    <div class="form-group">
        <label class="form-name" for="form_name">Form Name</label>
        <input class="form-control" type="text" name="form_name" value="{{ $form->name }}">
    </div>
    
    <div class="form-group">
        <label class="form-description" for="form_description">Form Description</label>
        <textarea class="form-control" name="form_description" id="" cols="30" rows="5">{{$form->description}}</textarea>
    </div>

    <div class="form-group">
        <label class="form-confirmation" for="form_confirmation">Confirmation Message</label>
       <textarea class="form-control" name="form_confirmation" id="" cols="30" rows="5">{{$form->confirmation_message}}</textarea>        
    </div>
    
    <h3>Fields</h3>
    
    @include('templates/js/add-fields/add-fields')
    
    
    {!! Form::close() !!}
    <script type="text/json" id="form-json">{!! $form->json_form !!}</script>
    <script type="text/json" id="fields-json">{!! $form->json_fields !!}</script>
</div>
@stop
