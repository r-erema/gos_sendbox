import React from 'react';
import FloatingActionButton from 'material-ui/FloatingActionButton';
import ContentAdd from 'material-ui/svg-icons/content/add';

const style = {
  position : 'absolute',
  top : 80,
  right : 20
};

var AddExpenditureButton = React.createClass({

    getInitialState : function () {
        return {
            disabled : false
        }
    },

    handleClick : function () {
        this.setState({
            disabled : true
        });
        this.props.onOpenWindow();
    },

    componentWillReceiveProps : function (nextProps) {
        this.state.disabled = nextProps.disabled;
    },

    render : function () {
        return (
            <FloatingActionButton style={style} onClick={this.handleClick} disabled={this.state.disabled} >
                <ContentAdd />
            </FloatingActionButton>
        );
    }
});

export default AddExpenditureButton;
