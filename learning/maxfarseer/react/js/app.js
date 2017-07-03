var quotes = [
    {
        author : 'Vito Corleone',
        text : 'I’m going to make him an offer he can’t refuse'
    },
    {
        author : 'T-800',
        text : 'I\'ll be back'
    }
];
/*
var Comments = React.createClass({
    render : function () {
        return (
            <div className="comments">
                There are no comments yet
            </div>
        )
    }
});*/
var Quote = React.createClass({
    render : function () {
        return (
            <div className="quote" >
                <p className="author">{this.props.data.author}:</p>
                <p className="text">{this.props.data.text}</p>
            </div>
        );
    }
});

var Quotes = React.createClass({
    render : function () {
        var data = this.props.data;
        if (data.length) {
            var newsTemplate = data.map(function(item, index) {
                return (
                    <div key={index}>
                        <Quote data={item} />
                    </div>
                )
            })
        } else {
            newsTemplate = <p>There are no quotes yet</p>;
        }

        var totalCountComponent = null;
        if (data.length) {
            totalCountComponent = <strong className="quotes__count">Quotes count: {data.length}</strong>;
        }

        return (
            <div className="quotes">
                <h1>Quotes</h1>
                {newsTemplate}
                {totalCountComponent}
            </div>
        )
    }
});
Quotes.propTypes = {
    data : window.PropTypes.string.isRequired
};

var App = React.createClass({
    render : function () {
        return (
            <div className="app">
                <Quotes data={quotes} /> {/*data={quotes}*/}
                {/*<Comments />*/}
            </div>
        );
    }
});
window.PropTypes.checkPropTypes();
ReactDOM.render(
    <App />,
    document.getElementById('mount-point')
);