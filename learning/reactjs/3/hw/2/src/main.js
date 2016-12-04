const ReactDOM = require('react-dom');
const React = require('react');

let NewsApp = require('./components/NewsApp.jsx');

ReactDOM.render(
    <NewsApp news={news} />,
    document.getElementById('mount-point')
);