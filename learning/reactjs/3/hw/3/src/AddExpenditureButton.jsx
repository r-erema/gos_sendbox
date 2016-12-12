import React from 'react';
import FloatingActionButton from 'material-ui/FloatingActionButton';
import ContentAdd from 'material-ui/svg-icons/content/add';

const style = {
  margin : 20,
  float : 'right'
};

var AddExpenditureButton = React.createClass({
    handleClick : function () {
        console.log(1);
        //this.props.onOpenAdd();
    },
    render : function () {
        return (
            <FloatingActionButton style={style} >
                <ContentAdd />
            </FloatingActionButton>
        );
    }
});

export default AddExpenditureButton;
