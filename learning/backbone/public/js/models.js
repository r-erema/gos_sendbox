App.Models.Contact = Backbone.Model.extend({
    validate : function (attrs) {
        if (!attrs.first_name || !attrs.last_name) {
            return 'Name data not valid';
        }
        if (!attrs.email) {
            return 'E-mail data not valid';
        }
    }
});