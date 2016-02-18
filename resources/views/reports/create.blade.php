@extends('templates.admin')

@section('head')
    <meta name="csrf-token" content="{{csrf_token()}}">
@stop


@section('content')

    <h1>Create new Report</h1>
   <div class="report-fields-js" id="add-report-fields">

        <form method="POST" action="/reports">
            {!! csrf_field() !!}

            <div class="form-group">
                <label for="report_name">Report Name</label>
                <input class="form-control" type="text" name="form_name" value="{{ old('report_name') }}">
            </div>

            <div class="form-group">
                <label for="form_name">Form</label>
                <select class="form-control" name="form_name" id="form_name">
                    <template v-for="form in forms">
                        <option value="@{{form.id}}">@{{form.name}}</option>
                    </template>
                </select>
            </div>

            @include('templates/js/add-report-fields/add-report-fields')

            <div class="form-group">
                <button class="btn btn-primary" type="submit">Create</button>
            </div>
        </form>
    </div>
    <script type="text/json" id="report-fields-json">{!! $json !!}</script>

@stop