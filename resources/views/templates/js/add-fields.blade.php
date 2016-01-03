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
        <select name="fields[@{{field.id}}][type]" class="form-control" v-model="field.type">
            <template v-for = "valid_field in form.valid_fields">
                <option v-if="valid_field == field.type" value="@{{valid_field}}" selected>@{{capitalizeString(valid_field)}}</option>
                <option v-else value="@{{valid_field}}">@{{capitalizeString(valid_field)}}</option>
            </template>
        </select>
        <template v-if = "fieldHasOptions(field.id)"> 
            <label>Field Options</label>
            <template v-for="option in field.fieldOptions">
            <div class="field-options-wrapper field-option-@{{option.id}}">
                <div class="delete-field"><a v-on:click="deleteFieldOption(field.id, option.id)">X</a></div>
                <input
                type="text"
                class="form-control field-options"
                name="fields[@{{field.id}}][fieldOptions][@{{option.id}}]"
                v-model="option.text">
            </div>
        </template>
            <h5><a class="add-new add-new-field-option" v-on:click="addFieldOption(field.id)">Add New</a></h5>
        </template>
    </div>
    </template>
    <h5><a class="add-new add-new-field" id="add_new_field">Add New</a></h5>

    <div class="form-group">
        <button class="btn btn-primary" type="submit">Update</button>
    </div>
</div>
