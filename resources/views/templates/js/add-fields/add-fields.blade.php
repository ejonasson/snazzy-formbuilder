<div class="fields-js" id="add-fields">
    <template v-for="field in fields">
        <div class="field-data well well-sm field-@{{field.id}}">
            <span class="delete-field"><a v-on:click="deleteField(field.id)">X</a></span>
            <label>Field Name</label>
            <input type="text" class ="form-control" name="fields[@{{field.id}}][name]" v-model="field.name">
            
            <label>Field Description</label>
            <textarea class ="form-control"
            name="fields[@{{field.id}}][description]"
            v-model="field.description">
            </textarea>
            
            <label>Field Type</label>
            @include('templates/js/add-fields/partials/_field-type')
           
                <template v-if = "fieldHasOptions(field.id)"> 
                    <label>Field Options</label>
                    @include('templates/js/add-fields/partials/_field-options')
                </template>  
            <label>Field Rules</label>
            @include('templates/js/add-fields/partials/_field-rules')
        </div>
    </template>

    <h5><a class="add-new add-new-field" id="add_new_field">Add New</a></h5>

    <div class="form-group">
        <button class="btn btn-primary" type="submit">Update</button>
    </div>

</div>
