"use strict";

Vue.config.debug = true;


var adminVue = new Vue({
    el: '#admin',
    components: {
        addFields: require('./addFields'),
        showForms: require('./showForms'),
        addReportFields: require('./addReportFields')
    }
});