"use strict";

Vue.config.debug = true;
var $ = require('jquery');
var bootstrap = require('bootstrap');

var adminVue = new Vue({
    el: '#admin',
    components: {
      editForms: require('./editForms'),
      showForms: require('./showForms'),
      addReportFields: require('./addReportFields')
    },
    created: function() {
      // Enable Bootstrap Tooltips
      $('[data-toggle="tooltip"]').tooltip()
    },
    methods: {
    }
});
