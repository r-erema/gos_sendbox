const React = require('react');
const NewsItem = require('./NewsItem.jsx');


let NewsGrid = React.createClass({
    render : function () {
        return (
            <div>
                {
                    this.props.news.map(function (newsItem) {
                        return <NewsItem
                            key={newsItem.id}
                            title={newsItem.title}
                            text={newsItem.text}
                        />
                    })
                }
            </div>
        );
    }
});

module.exports = NewsGrid;