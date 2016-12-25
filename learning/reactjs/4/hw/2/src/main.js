import ReactDOM from 'react-dom';
import React from 'react';
//noinspection JSUnresolvedVariable
import articles from '../data/articles.json';
import ArticlesGrid from './ArticlesGrid.jsx';
import injectTapEventPlugin from 'react-tap-event-plugin';
injectTapEventPlugin();

ReactDOM.render(
    <ArticlesGrid articles={articles} />,
    document.getElementById('mount-point')
);