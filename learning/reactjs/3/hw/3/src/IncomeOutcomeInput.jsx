import React from 'react';
import TextField from 'material-ui/TextField';
import {RadioButton, RadioButtonGroup} from 'material-ui/RadioButton';

var IncomeOutcomeInput = React.createClass({

    getInitialState : function () {
        return {
            value : 0,
            IOType : 'Outcome',
            IOComment : null,
        }
    },

    handleChange : function (event) {
        if (event.target.name == 'value') {
            this.state.value = parseFloat(event.target.value);
        } else {
            this.state[event.target.name] = event.target.value;
        }
        this.props.onChange(this.state);
    },

    render : function () {
        return (
            <div>
                <div>
                    <TextField type="number" name="value" hintText="Income/Outcome number" min={0} onChange={this.handleChange} />
                </div>
                <div>
                    <TextField type="text" name="IOComment" hintText="Comment" onChange={this.handleChange} />
                </div>
                 <RadioButtonGroup name="IOType" defaultSelected="Outcome" onChange={this.handleChange} >
                    <RadioButton key={1} value="Outcome" label="Outcome" />
                    <RadioButton key={2} value="Income" label="Income" />
                 </RadioButtonGroup>
            </div>
        );
    }
});

export default IncomeOutcomeInput;