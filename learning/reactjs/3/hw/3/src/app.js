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
        var IOs = this.getIOFromDb();
        IOs.push(IO);
        localStorage.setItem('IO', JSON.stringify(IOs));
    },

    getIOFromDb : function () {
        return JSON.parse(localStorage.getItem('IO')) || [];
    },

    handleCloseWindow : function () {
        this.setState({
            disableAddButton : false
        });
    },

    render : function () {
        var tStyle = {width : '90%'};
        var incomeStyle = {color : '#357b18'};
        var outcometyle = {color : '#92281c'};
        var total = 0;
        return (
            <MuiThemeProvider muiTheme={getMuiTheme(darkBaseTheme)} >
                <div>
                    <AppBar title="Provident" />

                    <Table style={tStyle} >
                        <TableHeader displaySelectAll={false} adjustForCheckbox={false}>
                          <TableRow>
                            <TableHeaderColumn>IO Comment</TableHeaderColumn>
                            <TableHeaderColumn>IO value</TableHeaderColumn>
                          </TableRow>
                        </TableHeader>
                        <TableBody displayRowCheckbox={false} >
                            {
                                this.getIOFromDb().map(function (IO) {
                                    if (IO.IOType == 'Outcome') {
                                        var value = <span style={outcometyle} >-{IO.value}</span>;
                                        total -= IO.value;
                                    } else {
                                        value = <span style={incomeStyle} >+{IO.value}</span>
                                        total += IO.value;
                                    }
                                    return (
                                        <TableRow key={Math.random()}>
                                            <TableRowColumn>{IO.IOComment}</TableRowColumn>
                                            <TableRowColumn>{value}</TableRowColumn>
                                        </TableRow>
                                    );
                                })
                            }
                            <TableRow>
                                <TableRowColumn>Total:</TableRowColumn>
                                <TableRowColumn style={total > 0 ? incomeStyle : outcometyle} >{total}</TableRowColumn>
                             </TableRow>
                        </TableBody>
                    </Table>

                    <AddExpenditureButton onOpenWindow={this.handleOpenWindow} disable={this.state.disableAddButton} />
                    <ExpenditureAddingModalWindow open={this.state.openModalWindow} onIOAdd={this.handleAddIO} onModalWindowClose={this.handleCloseWindow} />
                </div>
            </MuiThemeProvider>
        );
    }
});

ArticlesGrid.render(
  <App />,
  document.getElementById('mount-point')
);

