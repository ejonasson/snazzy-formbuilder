@extends('templates.admin')

@section('head')
    <meta name="csrf-token" content="{{csrf_token()}}">
@stop

@section('title')
    My forms
@stop

@section('content')
    <div class="form-index" id="show-forms-index">
        <h1 class="page-title">My Forms</h1>
        <p>
            The forms you have created are listed below. Click "Add New" to generate a new form.
        </p>
        @foreach($forms as $form)
            <div class="single-form-entry form-{{$form->id}}">
                <div class="form-title">
                    <h2>{{$form->name}}</a></h2>
                </div>
                <div class="form-permalink">
                    <h5> URL: 
                    <input type="text" class="form-control permalink-preview" value="{{url('/forms/' . $form->id)}}" disabled>
                    </h5>
                </div>
                <div class="form-description">
                    {{$form->description}}
                </div>
                <ul class="form-actions">
                    <li class="form-action">
                        <a class="btn btn-default" href="/forms/{{$form->id}}" target="_blank">Preview</a>
                    </li>
                    <li class="form-action">
                        <a class="btn btn-primary" href="{{url('/forms/' . $form->id . '/edit')}}">Edit</a>
                        </li>
                    <li class="form-action">
                        <a class="btn btn-default" href="{{url('/form/' . $form->id . '/submissions')}}">View Results</a>
                    </li>
                    {{-- <li class="form-action"><a href="#" class="btn btn-default">View Reports</a></li> --}}
                    <li class="form-action"><a href="#" id="delete-form-{{$form->id}}" v-on:click="deleteForm({{$form->id}})" class="btn btn-danger">Delete</a></li>
                </ul>
            </div>
        @endforeach

        <a href="{{url('forms/create')}}" class="btn btn-primary btn-add-new">Add New</a>
        <script type="text/json" id="forms-json">{!! $json !!}</script>
    
    </div>


@stop