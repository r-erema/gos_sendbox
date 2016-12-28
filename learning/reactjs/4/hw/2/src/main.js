import ReactDOM from 'react-dom';
import React from 'react';
import { Router, Route, hashHistory } from 'react-router';
import App from './App.jsx';
import Article from './Article.jsx';
import injectTapEventPlugin from 'react-tap-event-plugin';
injectTapEventPlugin();

ReactDOM.render(
    <Router history={hashHistory}>
        <Route path='/' component={App} >
            <Route path='/message/:messageId' component={Article} />
        </Route>
    </Router>,
    document.getElementById('mount-point')
);