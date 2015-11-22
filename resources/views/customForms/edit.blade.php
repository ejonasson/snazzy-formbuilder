

@extends('templates/base')

@section('content')
    <h1>Edit</h1>
    {!! Form::model($form, ['method' => 'PATCH', 'action' => ['Form\FormController@update', $form->id]]) !!}
    {!! csrf_field() !!}

    <div class="form-group">
        <label for="form_name">Form Name</label>
        <input class="form-control" type="text" name="form_name" value="{{ $form->name }}">
    </div>

    <div class="form-group">
        <label for="form_description">Form Description</label>
        <textarea class="form-control" name="form_description" id="" cols="30" rows="5">{{ $form->description}}</textarea>
    </div>

    <h3>Fields</h3>
    @foreach($form->fields as $field)
        <div class="field-data well well-sm">
                <label>Field Name</label>
                <input type="text" class ="form-control" name="{{'field_' . $field->id . '_name'}}" value="{{$field->name}}">
                <label>Field Description</label>
                <textarea class ="form-control" name="{{'field_' . $field->id . '_description'}}">{{$field->description}}</textarea>
                <label>Field Type</label>
                {!! Form::select('field_' .$field->id . '_type', $form->valid_fields, $field->type, ['class' => 'form-control']) !!}
        </div>
    @endforeach

    <h5><a id="add_new_field">Add New</a></h5>

    <div class="form-group">
        <button class="btn btn-primary" type="submit">Update</button>
    </div>
    {!! Form::close() !!}
    

@stop