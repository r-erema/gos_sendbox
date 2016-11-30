var phrases;
exports.connect = function () {
    phrases = require('./ru.json');
};

exports.getPhrase = function (name) {
    if(!phrases[name]) {
        throw new Error('This phrase doesn\'t exists');
    }
    return phrases[name];
};