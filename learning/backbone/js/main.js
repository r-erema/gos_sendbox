(function () {
    window.App = {
        Models : {},
        Views : {},
        Collections : {},
    };

    App.Models.Person;
    App.Views.Person;
    App.Collections.People;

    window.template = function (id) {
        return _.template($('#' + id).html());
    };

    App.Models.Person = Backbone.Model.extend({
        defaults : {
            name : 'Matt',
            age : 27,
            job : 'Sys'
        },

        validate : function (attrs) {
            if (attrs.age < 0) {
                return 'Wrong age'
            }
        },

        walk : function () {
            return this.get('name') + ' is walking';
        }
    });

    App.Collections.People = Backbone.Collection.extend({
        model : App.Models.Person
    });

    App.Views.People = Backbone.View.extend({
        tagName : 'ul',
        render : function () {
            console.log(this.collection);
            this.collection.each(function (person) {
                var personView = new App.Views.Person({model : person});
                this.$el.append(personView.render().el);
            }, this);
            return this;
        }

    });


    App.Views.Person= Backbone.View.extend({
        tagName : 'li',
        template : template('personTemplate'),
        render : function () {
            this.$el.html(this.template(this.model.toJSON()));
            return this;
        }
    });

    var peopleCollection = new App.Collections.People([
        {
            name : 'Petya',
            age : 22,
            job : 'Manager'
        },
        {
            name : 'Adolf',
            age : 33,
            job : 'Cleaner'
        },
        {
            name : 'Chuchmambek',
            job : 'Builder'
        }
    ]);

    var peopleView = new App.Views.People({collection : peopleCollection});

    $(document.body).append(peopleView.render().el);

}());