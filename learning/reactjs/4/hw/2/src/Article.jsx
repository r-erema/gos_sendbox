import React from 'react';

class Article extends React.Component {

    constructor() {
        console.log(1);
        super();
    }

    render() {
        console.log(1111);
        return (
            <div>123</div>
        );
    }
}

export default Article;