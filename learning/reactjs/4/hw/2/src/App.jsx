import React from 'react';
import ArticlesGrid from './ArticlesGrid.jsx';
//noinspection JSUnresolvedVariable
import articles from '../data/articles.json';

class App extends React.Component {

    constructor() {
        super();
    }

    render() {
        return (
            <ArticlesGrid articles={articles} >
                {this.props.children}
            </ArticlesGrid>
        );
    }
}

export default App;