<div class="fields-js" id="add-fields">
    <div id="sortable-fields">
    <template v-for="field in fields">
        <div id="field_@{{field.id}}" class="field-data well well-sm field-@{{field.id}}">
            <input type="hidden" v-model="field.position" name="fields[@{{field.id}}][position]">
            <span class="delete-field"><a v-on:click="deleteField(field.id)">X</a></span>
            <label class="field-label field-name">Field Name</label>
            <input type="text" class ="form-control" name="fields[@{{field.id}}][name]" v-model="field.name">
            
            <label class="field-label field-description">Field Description</label>
            <textarea class ="form-control"
            name="fields[@{{field.id}}][description]"
            v-model="field.description">
            </textarea>
            
            <label class="field-label field-type">Field Type</label>
            @include('templates/js/add-fields/partials/_field-type')
           
                <template v-if = "fieldHasOptions(field.id)"> 
                    <label class="field-label field-option">Field Options</label>
                    @include('templates/js/add-fields/partials/_field-options')
                </template>  
            <label class="field-label field-rules">Field Rules</label>
            @include('templates/js/add-fields/partials/_field-rules')
        </div>
    </template>
    </div>

    <a class="btn btn-default add-new" id="add_new_field">Add New</a>

    <div class="form-group">
        <button class="btn btn-primary" type="submit">Update</button>
    </div>

</div>
