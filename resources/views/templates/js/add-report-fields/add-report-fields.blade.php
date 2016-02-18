
    <h2>Report Fields</h2>
    TODO: Add functionality for looping through fields
    <template v-for="reportField in reportFields">
        <div class="report-field-data well well-sm">
            <template v-for="form in forms">
                <h5>Field</h5>
                <div class="form-group">
                    <select class="form-control" name="form_field_name" id="form_field_name">
                        <template v-for="field in form.fields">
                            <option value="@{{field.id}}">@{{field.name}}</option>
                        </template>
                    </select>
                </div>
                <h5>Rule</h5>
                <div class="form-group">
                    <select class="form-control" name="form_field_rule" id="form_field_rule">
                        <template>
                            <option value="sum">Sum</option>
                        </template>
                    </select>            
                </div>
            </template>
        </div>
    </template>
    <p><a href="#" v-on:click="addReportField">Add Field</a></p>
    <pre>
    @{{$data | json}}
    </pre>