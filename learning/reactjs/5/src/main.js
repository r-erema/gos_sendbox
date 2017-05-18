import ReactDOM from 'react-dom';
import React from 'react';
import {Router, Route, hashHistory} from 'react-router';
import SessionActions from './actions/SessionAction'


import App from './App.jsx';


window.handleGoogleApiLoaded = () => {
    SessionActions.authorize(true, renderApp);
};

function renderApp() {
    ReactDOM.render(
        <App />,
        document.getElementById('mount-point')
    );
}