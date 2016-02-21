"use strict";

Vue.config.debug = true;
require('jquery');

var adminVue = new Vue({
    el: '#admin',
    components: {
        addFields: require('./addFields'),
        showForms: require('./showForms'),
        addReportFields: require('./addReportFields')
    },
    created: function() {
    },
    methods: {
    }
});