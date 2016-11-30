var EventEmitter = require('events').EventEmitter;

var server = new EventEmitter;

server.on('request', function (request) {
    request.approved = true;
});

server.on('request', function (request) {
    console.log(request);
});

server.emit('request', {from: 'Client'});
server.emit('request', {from: 'Client yet'});

console.log(server.listenerCount('request'));

server.on('error', function () {});

server.emit('error');