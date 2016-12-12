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

const App = () => (
    <MuiThemeProvider muiTheme={getMuiTheme(darkBaseTheme)} >
        <div>
            <AppBar title="Provident" />
            <AddExpenditureButton onClick={this.handleClick} />
            <ExpenditureAddingModalWindow onOpenAdd={this.handleOpenWindow} />
        </div>
    </MuiThemeProvider>
);


ReactDOM.render(
  <App />,
  document.getElementById('mount-point')
);

