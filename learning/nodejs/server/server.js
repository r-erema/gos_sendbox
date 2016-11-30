var http = require('http');
var url = require('url');

var server = new http.Server();
server.listen('1337', 'localhost');

server.on('request', function (req, res) {
    var urlParsed = url.parse(req.url, true);
    if (urlParsed.pathname === '/echo' && urlParsed.query.message) {
        res.end(urlParsed.query.message);
    } else {
        res.statusCode = 404;
        res.end('Page not found');
    }
});