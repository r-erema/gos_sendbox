import React from 'react';
import ReactDOM from 'react-dom';
import injectTapEventPlugin from 'react-tap-event-plugin';
injectTapEventPlugin();
import getMuiTheme from 'material-ui/styles/getMuiTheme';
import darkBaseTheme from 'material-ui/styles/baseThemes/darkBaseTheme';
import MuiThemeProvider from 'material-ui/styles/MuiThemeProvider';
import AppBar from 'material-ui/AppBar';
import AddExpenditureButton from './AddExpenditureButton.jsx';
import ExpenditureAddingModalWindow from './ExpenditureAddingModalWindow.jsx';
import {Table, TableBody, TableHeader, TableHeaderColumn, TableRow, TableRowColumn} from 'material-ui/Table';



var App = React.createClass({

    getInitialState : function () {
        return {
            disableAddButton : false,
            openModalWindow : false
        };
    },

    handleOpenWindow : function () {
        this.setState({
            openModalWindow : true
        });
    },

    handleAddIO : function (IO) {
        var IOs = JSON.parse(localStorage.getItem('IO')) || [];
        IOs.push(IO);
        localStorage.setItem('IO', JSON.stringify(IOs));
        this.setState({
            disableAddButton : false
        });
    },

    render : function () {
        var tStyle = {width : '90%'};
        return (
            <MuiThemeProvider muiTheme={getMuiTheme(darkBaseTheme)} >
                <div>
                    <AppBar title="Provident" />

                    <Table style={tStyle} >
                        <TableHeader>
                          <TableRow>
                            <TableHeaderColumn>ID</TableHeaderColumn>
                            <TableHeaderColumn>Name</TableHeaderColumn>
                            <TableHeaderColumn>Status</TableHeaderColumn>
                          </TableRow>
                        </TableHeader>
                    </Table>

                    <AddExpenditureButton onOpenWindow={this.handleOpenWindow} disable={this.state.disableAddButton} />
                    <ExpenditureAddingModalWindow open={this.state.openModalWindow} onIOAdd={this.handleAddIO}/>
                </div>
            </MuiThemeProvider>
        );
    }
});

ReactDOM.render(
  <App />,
  document.getElementById('mount-point')
);

