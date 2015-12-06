var formBuilder = new Vue({

});


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
            id: 'unset',
            name : '',
            description : '',
            type: 'text'
        };
        addFields.fields = addFields.fields.concat(blankField);
    },
    deleteField: function(field_id) {
      if (confirm('Are you sure you would like to delete this field?')) {
        var field = _.findWhere(this.fields, {id: field_id});
        var fieldClass = '.field-' + field.id;
        var fieldURL = '/fields/' + field.id;

        $.ajax({
          url: fieldURL,
          type: 'DELETE',
          success: function(result) {
              $(fieldClass).fadeOut();
          }
        })
      } 
    },
    addFieldOption: function(field_id) {
        var blankFieldOption = {
            id: 'unset',
            name : '',
            text : '',
            field_id: field_id
        };
        var field = _.findWhere(addFields.fields, {id: field_id}); 
        field.fieldOptions = field.fieldOptions.concat(blankFieldOption);      
    }
}
});

