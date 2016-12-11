(function () {
    $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
    });

    window.App = {
        Models : {},
        Views : {},
        Collections : {},
        Router : {}
    };

    window.vent = _.extend({}, Backbone.Events);



    /*App.Models.Task = Backbone.Model.extend({
        defaults : {
            title : '',
            complete : 0
        },
        urlRoot : '/tasks'
    });

    App.Collections.Tasks = Backbone.Collection.extend({
        model : App.Models.Task,
        url : '/tasks'
    });

    App.Views.Tasks = Backbone.View.extend({
        tagName : 'ul',
        initialize : function () {
            this.collection.on('add', this.addOne, this);
        },
        render : function () {
            this.$el.empty();
            this.collection.each(this.addOne, this);
            return this;
        },
        addOne : function (task) {
            var task = new App.Views.Task({model : task});
            this.$el.append(task.render().el);
        }
    });

    App.Views.Task = Backbone.View.extend({
        tagName : 'li',
        initialize : function () {
            this.model.on('destroy', this.remove, this);
        },
        render : function () {
            this.$el.html(this.model.get('title'));
            return this;
        }
    });*/

}());