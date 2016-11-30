var util = require('util');

var obj = {
    a: 5,
    b: 6,
    inspect: function () {
        return (this.a*this.b);
    }
};
//obj.self = obj;

console.log(util.inspect(obj));

var str = util.format('My %s %d %j', 'string', 123, obj);
console.log(str);

function Animal(name) {
    this.name = name;
}

Animal.prototype.walk = function () {
    console.log('Ходит ' + this.name);
};

function Rabbit(name) {
    this.name = name;
}

util.inherits(Rabbit, Animal);

Rabbit.prototype.jump = function () {
    console.log('Прыгает ' + this.name);
};

var rabbit = new Rabbit('Наш кролик');
rabbit.walk();
rabbit.jump();