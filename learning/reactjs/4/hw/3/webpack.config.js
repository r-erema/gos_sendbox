module.exports = {

  entry: './src/main.js',
  output: {
    filename: 'bundle.js',
    path : './public'
  },

  watch : true,

  module : {
      loaders: [
          {
              test: /\.json$/,
              loader: 'json-loader'
          },
          {
              test: /(?:\.js|\.jsx)$/,
              exclude: /node_modules/,
              loader: 'babel-loader'
          }
      ]
  }
};