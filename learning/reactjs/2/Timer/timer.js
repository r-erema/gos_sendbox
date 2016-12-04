var Timer = React.createClass({
    getInitialState : function () {
        return {
            run : false,
            seconds : 0,
            minutes : 0
        }
    },

    tick : function () {
        if (60 === ++this.state.seconds) {
            var newState = {
                seconds : 0,
                minutes : ++this.state.minutes
            };
        } else {
            newState = {
                seconds : this.state.seconds
            }
        }
        this.setState(newState);
    },

    reset : function () {
        this.setState({
            run : false,
            seconds : 0,
            minutes : 0
        });
        clearInterval(this.timer);
    },

    handleRunStmt : function () {
        var isRun = !this.state.run;
        if (isRun) {
            this.timer = setInterval(this.tick, 1000)
        } else {
            clearInterval(this.timer);
        }
        this.setState({run : isRun});
    },

    render : function () {
        return (
            <div>
                <h4>{this.state.minutes}:{this.state.seconds}</h4>
                <button onClick={this.handleRunStmt}>{this.state.run ? 'Pause' : 'Go'}</button>
                <button onClick={this.reset}>Reset</button>
            </div>
        );
    }
});

ReactDOM.render(
    <Timer />,
    document.getElementById('mount-point')
);