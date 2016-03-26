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
        <?php $count = 0; ?>
        <?php $length = count($forms) ?>
        @foreach($forms as $form)
            @if ($count % 2 == 0)
                <div class="row">
            @endif
            <div class="col-sm-6">
                <div class="panel panel-default single-form form-{{$form->id}}">
                        <div class="panel-heading form-title single-form__title">
                            <h3>{{$form->name}}</a></h3>
                        </div>
                        <div class="panel-body">
                          <div class="single-form__permalink">
                              <h5> URL:
                              <input type="text" class="form-control single-form__permalink__preview" value="{{url('/forms/' . $form->id)}}" disabled>
                              </h5>
                          </div>
                          <div class="single-form__description">
                              {{$form->description}}
                          </div>
                          <ul class="single-form__actions">
                              <li class="single-form__action">
                                  <a class="btn btn-default" href="/forms/{{$form->id}}" target="_blank">Preview</a>
                              </li>
                              <li class="single-form__action">
                                  <a class="btn btn-primary" href="{{url('/forms/' . $form->id . '/edit')}}">Edit</a>
                                  </li>
                              <li class="single-form__action">
                                  <a class="btn btn-default" href="{{url('/form/' . $form->id . '/submissions')}}">View Results</a>
                              </li>

                          <li class="single-form__action"><a href="#" id="delete-form-{{$form->id}}" v-on:click="deleteForm({{$form->id}})" class="btn btn-danger">Delete</a></li>
                      </ul>
                        </div>

                </div>
            </div>
            <?php $count++; ?>
            @if ($count % 2 == 0 || $count == $length)
                </div>
            @endif
        @endforeach

        <a href="{{url('forms/create')}}" class="btn btn-primary btn-add-new">Add New</a>
        <script type="text/json" id="forms-json">{!! $json !!}</script>

    </div>


@stop
