"use strict";

Vue.config.debug = true;
var s = require("underscore.string");

var adminVue = new Vue({
    el: '#admin',
    components: {
        addFields: require('./addFields'),
        showForms: require('./showForms'),
        addReportFields: require('./addReportFields')
    }
});