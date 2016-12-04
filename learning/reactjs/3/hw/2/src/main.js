const ReactDOM = require('react-dom');
const React = require('react');

let NewsApp = require('./components/NewsApp.jsx');

ReactDOM.render(
    <NewsApp />,
    document.getElementById('mount-point')
);