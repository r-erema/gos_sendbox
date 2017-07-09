var quotes = [
    {
        author : 'Vito Corleone',
        text : 'I’m going to make him an offer he can’t refuse',
        more : 'I understand. You found paradise in America, you had a good trade, you made a good living. The police protected you and there were courts of law. You didn\'t need a friend like me. But, now you come to me, and you say: "Don Corleone, give me justice." But you don\'t ask with respect. You don\'t offer friendship. You don\'t even think to call me Godfather. Instead, you come into my house on the day my daughter is to be married, and you ask me to do murder for money.'
    },
    {
        author : 'T-800',
        text : 'I\'ll be back',
        more : 'Chill out, dickwad'
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

var Quote = React.createClass({
    propTypes: {
        data: PropTypes.shape({
            author: PropTypes.string.isRequired,
            text: PropTypes.string.isRequired,
            more : PropTypes.string.isRequired
        })
    },
    getInitialState : function () {
        return {visible : false};
    },
    moreClick : function (e) {
       e.preventDefault();
       this.setState({visible : true});
    },
    render : function () {
        return (
            <div className="quote" >
                <p className="author">{this.props.data.author}:</p>
                <p className="text">{this.props.data.text}</p>
                <a href="#"
                   className={'more ' + (this.state.visible ? 'none' : '')}
                   onClick={this.moreClick}>
                    more
                </a>
                <p className={'text ' + (this.state.visible ? '' : 'none')} >{this.props.data.more}</p>
            </div>
        );
    }
});

var Quotes = React.createClass({
    getInitialState : function () {
        return {counter: 0};
    },
    onTotalClicks : function () {
        this.setState({counter : ++this.state.counter});
    },
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
            totalCountComponent = <strong className="quotes__count" onClick={this.onTotalClicks}>
                Quotes count: {data.length}
            </strong>;
        }

        return (
            <div className="quotes">
                <h1>Quotes</h1>
                <Add />
                {newsTemplate}
                {totalCountComponent}
            </div>
        )
    }
});

var Add = React.createClass({
    onCheckRuleClick: function(e) {
        ReactDOM.findDOMNode(this.refs.alert_button).disabled = !e.target.checked;
    },
    componentDidMount : function () {
        ReactDOM.findDOMNode(this.refs.author).focus();
    },
    onClickHandler : function (e) {
        e.preventDefault();
    },
    render : function () {
        return (
            <form className="add_quote" >
                <input
                    type="text"
                    className="add_author"
                    defaultValue=""
                    placeholder="Author"
                    ref="author"
                />
                <textarea
                    className="add_etxt"
                    defaultValue=""
                    placeholder="Quote text"
                    ref="text"
                ></textarea>
                <label className="add_checkrule">
                    <input type="checkbox" defaultChecked={false} ref="checkrule" onChange={this.onCheckRuleClick}/>
                    I agree
                </label>
                <button
                    className="add_btn"
                    onClick={this.onClickHandler}
                    ref="alert_button"
                    disabled
                >
                    show alert
                </button>
            </form>
        );
    }
});

ReactDOM.render(
    <App />,
    document.getElementById('mount-point')
);