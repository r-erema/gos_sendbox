App.Collections.ContactsCollection = Backbone.Collection.extend({
    model : App.Models.Contact,
    url : '/contacts'
});