const React = require('react');

module.exports = React.createClass({

    handleSearchQuery : function (event) {
        this.props.onSearch(event.target.value)
    },

    render : function () {
        return (
            <div>
                <input type="text" onChange={this.handleSearchQuery} />
            </div>
        );
    }
});