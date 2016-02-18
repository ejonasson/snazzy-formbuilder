if ($('#add-report-fields').length > 0) {

    var addReportFields = new Vue ({
        el: '#add-report-fields',
        data: {
            forms: [],
            reportFields: []
        },
        created: function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
                }
            });
            this.parseData();
            console.log(this.reportFields);
            $('#add_new_field').click(this.addReportField);
        },
        methods: {
            parseData: function() {
                this.forms = JSON.parse($('#report-fields-json').first().text());
            },
            addReportField: function() {
                var blankField = {
                    id: Math.random().toString(36),
                    fieldId: 0,
                    rule: null,
                    notSaved: true
                };
                addReportFields.reportFields = addReportFields.reportFields.concat(blankField);
            },
        }
    });

}