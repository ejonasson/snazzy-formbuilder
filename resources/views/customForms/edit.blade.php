

@extends('templates.admin')

@section('title')
    Edit {{$form->name}}
@stop

@section('head')
    <meta name="csrf-token" content="{{csrf_token()}}">
@stop

@section('content')
<div class="edit-form-content" id="edit-form">
    <h1 class="admin-title">Editing {{ $form->name }}</h1>
    {!! Form::model($form, ['method' => 'PATCH', 'action' => ['Form\FormController@update'  , $form->id]]) !!}
    {!! csrf_field() !!}

    <ul class="nav nav-tabs">
        <li role="presentation" v-bind:class="{'active': isActiveTab('formDetailsTab')}" v-on:click="setActiveTab('formDetailsTab')" id="formDetails" class="nav-tab active"><a href="#">Form Details</a></li>
        <li role="presentation" v-bind:class="{'active': isActiveTab('formFieldsTab')}" id="formFields" v-on:click="setActiveTab('formFieldsTab')" class="nav-tab"><a href="#">Form Fields</a></li>
    </ul>

    <div class="form-tabs">
        <div class="form-tab" id="formDetailsTab" v-show="isActiveTab('formDetailsTab')">
            <div class="form-group">
                <label class="form-name" for="form_name">
                  Form Name
                </label>
                <input class="form-control" type="text" name="form_name" value="{{ $form->name }}">
            </div>

           <div class="form-group">
               <label class="form-description" for="form_description">Form Description</label>
               <textarea
               class="form-control"
               name="form_description"
               id="" cols="30" rows="5"
               placeholder="Enter a description for your form">{{$form->description}}</textarea>
           </div>

            <div class="form-group">
                <label class="form-confirmation" for="form_confirmation">Confirmation Message</label>
               <textarea
                class="form-control"
                name="form_confirmation"
                id="" cols="30" rows="5"
                placeholder="Enter the message you want students to see when submitting a form."
                >{{$form->confirmation_message}}</textarea>
            </div>
        </div>
        <div class="form-tab" id="formFieldsTab" v-show="isActiveTab('formFieldsTab')">
            @include('templates/js/add-fields/add-fields')
        </div>
    </div>
    <div class="form-group">
        <button class="btn btn-primary" type="submit">Update</button>
    </div>
    {!! Form::close() !!}
    <script type="text/json" id="form-json">{!! $form->json_form !!}</script>
    <script type="text/json" id="fields-json">{!! $form->json_fields !!}</script>
</div>
@stop
