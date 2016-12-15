import React from 'react';
import Dialog from 'material-ui/Dialog';
import FlatButton from 'material-ui/FlatButton';
import IncomeOutcomeInput from './IncomeOutcomeInput.jsx';

var ExpenditureAddingModalWindow = React.createClass({

    getInitialState : function () {
        return {
            open : false,
            IO : {
                value : 0,
                IOType : 'Outcome'
            },
            disableAddButton : true
        }
    },

    handleIOAdd : function() {
        this.setState({open: false});
        this.props.onIOAdd(this.state.IO);
        this.props.onModalWindowClose();
    },

    handleCancel : function () {
        this.setState({open: false});
        this.props.onModalWindowClose();
    },

    componentWillReceiveProps : function (nextProps) {
        this.state.open = nextProps.open;
    },

    handleIOChange : function (IO) {
        if (IO.value > 0) {
            this.setState({IO : IO, disableAddButton : false});
        } else {
            this.setState({disableAddButton : true});
        }
    },

    render : function () {
        const actions = [
            <FlatButton
                label="Ok"
                disabled={this.state.disableAddButton}
                primary={true}
                keyboardFocused={true}
                onTouchTap={this.handleIOAdd}
            />,
            <FlatButton
                label="Cancel"
                onTouchTap={this.handleCancel}
            />,
        ];
        return (
            <Dialog open={this.state.open} actions={actions} >
                <IncomeOutcomeInput onChange={this.handleIOChange}/>
            </Dialog>
        );
    }

});

export default ExpenditureAddingModalWindow;