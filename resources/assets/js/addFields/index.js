var s = require("underscore.string");

if ($('#add-fields').length > 0) {

  var addFields = new Vue({
    el: '#add-fields',
    data: {
      form: [],
      fields: []
    },
    created: function() {
      $.ajaxSetup({
        headers: {
          'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
        }
      });
      this.parseData();
      $('#add_new_field').click(this.addEmptyField);
    },
    methods: {
      parseData: function() {
        this.form = JSON.parse($('#form-json').first().text());  
        this.fields = JSON.parse($('#fields-json').first().text());  
      },
      addEmptyField: function(){
        var blankField = {
          id: Math.random().toString(36),
          name : '',
          description : '',
          type: 'text',
          fieldOptions: [],
          rules: [],
          notSaved: true
        };
        addFields.fields = addFields.fields.concat(blankField);
      },
      deleteField: function(field_id) {
        if (confirm('Are you sure you would like to delete this field?')) {
          var field = _.findWhere(this.fields, {id: field_id});
          var fieldClass = '.field-' + field.id;
          var fieldURL = '/fields/' + field.id;


        // Check for the "notSaved key"
        if (typeof field.notSaved === 'undefined') {
         $.ajax({
          url: fieldURL,
          type: 'DELETE',
          success: function(result) {
            $(fieldClass).fadeOut();
          }
        });          
       }

        // Drop the field from the array.
        var fieldLocation = this.fields.indexOf(field);
        this.fields.splice(fieldLocation, 1);

      } 
    },
    addFieldOption: function(field_id) {
      var blankFieldOption = {
        id: Math.random().toString(36),
        name : '',
        text : '',
        field_id: field_id,
        notSaved: true
      };
      var field = _.findWhere(addFields.fields, {id: field_id}); 
      field.fieldOptions = field.fieldOptions.concat(blankFieldOption);      
    },
    deleteFieldOption: function(field_id, option_id) {
      if (confirm('Are you sure you would like to delete this field?')) {
        var field = _.findWhere(this.fields, {id: field_id});
        var fieldOption = _.findWhere(field.fieldOptions, {id: option_id});
        var fieldOptionClass = '.field-option-' + fieldOption.id;
        var fieldOptionURL = '/fieldOptions/' + fieldOption.id;

        // Check for the "notSaved key"
        if (typeof fieldOption.notSaved === 'undefined') {
          $.ajax({
            url: fieldOptionURL,
            type: 'DELETE',
            success: function(result) {
              $(fieldOptionClass).fadeOut();
            }
          });    
        }

         // Drop the field from the array.
         var fieldOptionLocation = field.fieldOptions.indexOf(fieldOption);
         console.log(field.fieldOptions);
         field.fieldOptions.splice(fieldOptionLocation, 1);       

       } 
     },
    // Check if a Field is elligible to have options
    fieldHasOptions: function(field_id) {
      var field = _.findWhere(this.fields, {id: field_id});
      var fieldsWithOptions = this.form.field_types_with_options;
      if ($.inArray(field.type, fieldsWithOptions) > -1) {
        return true;
      }
      return false;
    },

    capitalizeString: function(string) {
      var str = s(string).capitalize().value();
      return str;
    }
  }
});


}

