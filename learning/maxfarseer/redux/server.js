var webpack = require('webpack');
var webpackDevMiddleware = require('webpack-dev-middleware');
var webpackHotMiddleware = require('webpack-hot-middleware');
var config = require('./webpack.config');
var app = new (require('express'))();
var port = 3000;
var compiler = webpack(config);
console.log(config.output.path);
app.use(webpackDevMiddleware(compiler, { noInfo: false, publicPath: config.output.publicPath }));
app.use(webpackHotMiddleware(compiler));
app.get("/", function(req, res) {
    res.sendFile(__dirname + '/index.html')
});
app.listen(port, function(error) {
    if (error) {
        console.error(error)
    } else {
        console.info("==> Listening on port %s. Open up http://localhost:%s/ in your browser.", port, port)
    }
});