var db = require('../db');
var log = require('../logger');

function User(name) {
    this.name = name;
}

User.prototype.hello = function (who) {
    log(db.getPhrase('Hello') + ', ' + who.name);
};

module.exports = User;