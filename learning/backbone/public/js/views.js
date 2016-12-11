App.Views.App = Backbone.View.extend({
    initialize : function () {
        var addContact = new App.Views.AddContact({collection : App.contacts});
        var allContacts = new App.Views.Contacts({collection : App.contacts}).render();
        $('#allContactsTable').append(allContacts.el);
    }
});


App.Views.AddContact = Backbone.View.extend({
    el : '#contact-form',
    events : {
        'submit' : 'addContact',
    },
    addContact : function (e) {
        e.preventDefault();
        var newContact = {};
        this.$el.serializeArray().map(function (field) {
            newContact[field.name] = field.value;
        });
        this.$el[0].reset();
        var newContact = this.collection.create(newContact, {wait : true});
    }
});

App.Views.UpdateContact = Backbone.View.extend({
    events : {
        'submit' : 'updateContact',
    },
    initialize : function () {
        this.render();
    },
    updateContact : function (e) {
        e.preventDefault();
        var updContact = {};
        this.$form.serializeArray().map(function (field) {
            updContact[field.name] = field.value;
        });
        this.model.save(updContact);
        this.$form.remove();
    },
    $form : $('<form method="post" id="update-contact-form"><div><label for="first_name">Имя:</label><input type="text" id="first_name" name="first_name" /></div><div><label for="first_name">Фамилия:</label><input type="text" id="last_name" name="last_name" /></div><div><label for="first_name">E-mail:</label><input type="text" id="email" name="email" /></div><div><label for="first_name">Описание:</label><input type="text" id="description" name="description" /></div><div><input type="submit" value="Добавить" /></div></form>'),
    render : function () {
        for (var attrName in this.model.attributes) {
            this.$form.find('input[name="' + attrName + '"]').val(this.model.attributes[attrName]);
        }
        this.$el.html(this.$form);
        return this;
    }
});


App.Views.Contacts = Backbone.View.extend({
    tagName : 'tbody',
    initialize : function () {
        this.collection.on('add', this.addOne, this)
    },
    render : function () {
        this.collection.each(this.addOne, this);
        return this;
    },
    addOne : function (contact) {
        var singleContact = new App.Views.Contact({model : contact});
        this.$el.append(singleContact.render().el);
    }
});

App.Views.Contact = Backbone.View.extend({
    tagName : 'tr',
    events : {
        'click a.delete' : 'removeContact',
        'click a.update' : 'updateContact',
    },
    initialize : function () {
        this.model.on('destroy', this.rerender, this);
        this.model.on('change', this.render, this);
    },
    rerender : function () {
        this.remove();
    },
    removeContact : function (e) {
        e.preventDefault();
        this.model.destroy();
    },
    updateContact : function (e) {
         e.preventDefault();
         var updateContactView = new App.Views.UpdateContact({model : this.model});
         $('body').append(updateContactView.render().el);
    },
    render :  function () {
        var innerHtml = '';

        for (var i in this.model.attributes) {
            innerHtml += '<td>' + this.model.attributes[i] + '</td>'
        }
        innerHtml += '<td><a class="update" href="/contacts#' + this.model.attributes.id + '" >Редактировать</a> <a class="delete" href="/contacts#' + this.model.attributes.id + '" >Удалить</a></td>';
        this.$el.html(innerHtml);
        return this;
    }
});
