var $ = require('jquery');

if ($('#edit-form').length > 0) {

  var editForm = new Vue ({
    el: '#edit-form',
    data: function () {
      return {
        activeTab: 'formFieldsTab'
      }
    },
    components: {
      addFields: require('./addFields'),
    },
    computed: {
    },
    methods: {
      setActiveTab: function(tab) {
        this.activeTab = tab;
      },
      isActiveTab: function(tab) {
        return this.activeTab === tab;
      }
    },
  });
}
