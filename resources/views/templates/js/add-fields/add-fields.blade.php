<div class="fields-js" id="add-fields">
    <div id="sortable-fields">
    <template v-for="field in fields">
        <div id="field_@{{field.id}}" class="panel panel-default editable-field field-@{{field.id}}">
            <div class="editable-field__heading panel-heading">
              <div class="editable-field__expandable-toggle">
                <a href="#" id="expandable-toggle-@{{field.id}}"><i class="fa fa-caret-square-o-down"></i></a>
              </div>
              <input type="text" class ="form-control editable-field__text-input editable-field__text-input--header" placeholder="Field Name" name="fields[@{{field.id}}][name]" v-model="field.name">
            </div>
            <div class="editable-field__body panel-body">
              <textarea class="form-control editable-field__textarea"
              name="fields[@{{field.id}}][description]"
              v-model="field.description"
              placeholder="Field Description"
              >
              </textarea>

              <label class="editable-field__field-label">Field Type</label>
              @include('templates/js/add-fields/partials/_field-type')

                  <template v-if = "fieldHasOptions(field.id)">
                      <label class="field-label field-option">Field Options</label>
                      @include('templates/js/add-fields/partials/_field-options')
                  </template>
              <label class="editable-field__field-label">Field Rules</label>
              @include('templates/js/add-fields/partials/_field-rules')
            </div>
            <span class="editable-field__delete"><a v-on:click="deleteField(field.id)"><i class="fa fa-trash"></i>
</a></span>
        </div>
        <input type="hidden" v-model="field.position" name="fields[@{{field.id}}][position]">
    </template>
    </div>

    <a class="btn btn-default add-new" id="add_new_field">Add New</a>
</div>
