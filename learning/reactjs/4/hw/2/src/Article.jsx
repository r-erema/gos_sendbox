import React from 'react';
import articles from '../data/articles.json';

class Article extends React.Component {


    constructor(props) {
        super(props);
        const artId  = props.params.articleId;
        this.state = {
            article: articles.find(article => article.id == artId)
        }
    }

    render() {
        return (
            <div>
                <div>{this.state.article.title}</div>
                <div><img src={`img/${this.state.article.img}`} /></div>
                <div>{this.state.article.text}</div>
            </div>
        );
    }
}

export default Article;