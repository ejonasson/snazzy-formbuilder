(function e(t,n,r){function s(o,u){if(!n[o]){if(!t[o]){var a=typeof require=="function"&&require;if(!u&&a)return a(o,!0);if(i)return i(o,!0);var f=new Error("Cannot find module '"+o+"'");throw f.code="MODULE_NOT_FOUND",f}var l=n[o]={exports:{}};t[o][0].call(l.exports,function(e){var n=t[o][1][e];return s(n?n:e)},l,l.exports,e,t,n,r)}return n[o].exports}var i=typeof require=="function"&&require;for(var o=0;o<r.length;o++)s(r[o]);return s})({1:[function(require,module,exports){
'use strict';

var formBuilder = new Vue({});

var addFields = new Vue({
    el: '#add-fields',
    data: {
        form: [],
        fields: []
    },
    created: function created() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
            }
        });
        this.parseData();
        $('#add_new_field').click(this.addEmptyField);
    },
    methods: {
        parseData: function parseData() {
            this.form = JSON.parse($('#form-json').first().text());
            this.fields = JSON.parse($('#fields-json').first().text());
        },
        addEmptyField: function addEmptyField() {
            var blankField = {
                id: 'unset',
                name: '',
                description: '',
                type: 'text'
            };
            addFields.fields = addFields.fields.concat(blankField);
        },
        deleteField: function deleteField(field_id) {
            if (confirm('Are you sure you would like to delete this field?')) {
                var field = _.findWhere(this.fields, { id: field_id });
                var fieldClass = '.field-' + field.id;
                var fieldURL = '/fields/' + field.id;

                $.ajax({
                    url: fieldURL,
                    type: 'DELETE',
                    success: function success(result) {
                        $(fieldClass).fadeOut();
                    }
                });
            }
        },
        addFieldOption: function addFieldOption(field_id) {
            var blankFieldOption = {
                id: 'unset',
                name: '',
                text: '',
                field_id: field_id
            };
            var field = _.findWhere(addFields.fields, { id: field_id });
            field.fieldOptions = field.fieldOptions.concat(blankFieldOption);
        }
    }
});

},{}]},{},[1]);

//# sourceMappingURL=main.js.map
