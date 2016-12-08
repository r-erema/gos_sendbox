var Person = Backbone.Model.extend({
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

//var p1 = new Person();

var p2 = new Person({name: 'Vasya', age : 36, job : 'Driver'});
p2.on('invalid', function (model, error) {
    console.log(error);
});