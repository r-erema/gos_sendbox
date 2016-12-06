var webpack = require('webpack');

module.exports = {
    entry: "./src/app.js",
    output: {
        path: __dirname + '/www/build/',
        publicPath: "build/",
        filename: "bundle.js"
    },
    module: {
        loaders: [
            {
                test: /\.js$/,
                loaders: ['babel-loader'],
                exclude: [/node_modules/, /public/]
            },
            {
                test: /\.jsx$/,
                loader: "babel-loader",
                exclude: [/node_modules/, /public/]
            }
        ]
    }
};