const React = require('react');
const news = require('./../news.json');

const NewsGrid = require('./NewsGrid.jsx');
const NewsSearch = require('./NewsSearch.jsx');

module.exports = React.createClass({

    getInitialState : function () {
        return {news : news};
    },

    handleSearch : function (searchQuery) {
        if (searchQuery) {
            searchQuery = searchQuery.toLowerCase();
            var news = this.getInitialState().news.filter(function (element) {
                var searchValue = element.title.toLowerCase();
                return searchValue.indexOf(searchQuery) !== -1;
            });
        } else {
            news = this.getInitialState().news;
        }

        this.setState({
            news : news
        });
    },

    render : function () {
        return (
            <div>
                <h1>News</h1>
                <NewsSearch onSearch={this.handleSearch} />
                <NewsGrid news={this.state.news} />
            </div>
        );
    }
});