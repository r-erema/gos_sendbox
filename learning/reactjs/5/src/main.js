import ReactDOM from 'react-dom';
import React from 'react';
import App from './App.jsx';

import api from './api';

window.handleGoogleApiLoaded = () => {
    console.log('login...');
    api.authorize({immediate: false});
};


ReactDOM.render(
    <App />,
    document.getElementById('mount-point')
);