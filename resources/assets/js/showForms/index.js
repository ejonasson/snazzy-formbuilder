
if ($('#show-forms-index').length > 0) {

    var showForms = new Vue ({
        el: '#show-forms-index',
        data: {
            forms: []
        },
        created: function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
                }
            });
            this.parseData();
        },
        methods: {
            parseData: function() {
                this.forms = JSON.parse($('#forms-json').first().text());
            },
            deleteForm: function(form_id) {
                if (confirm('Are you sure you would like to delete this form?')) {
                    var form = _.findWhere(this.forms, {id: form_id});
                    var formClass = '.form-' + form.id;
                    var formURL = '/forms/' + form.id;
                    console.log(formURL);
                    $.ajax({
                        url: formURL,
                        type: 'DELETE',
                        success: function(result) {
                            $(formClass).fadeOut();
                        }
                    });          
                } 
            }
        }
    });

}