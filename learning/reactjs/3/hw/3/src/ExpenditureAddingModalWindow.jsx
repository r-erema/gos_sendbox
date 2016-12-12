import React from 'react';
import Dialog from 'material-ui/Dialog';

var ExpenditureAddingModalWindow = React.createClass({
    getInitialState : function () {
        return {open : false};
    },
    handleOpenWindow : function () {
        console.log(123);
    },
    render : function () {
        return (
            <Dialog open={this.state.open} >
                Привет
            </Dialog>
        );
    }
});

export default ExpenditureAddingModalWindow;