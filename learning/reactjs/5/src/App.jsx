import React from 'react';
import MuiThemeProvider from 'material-ui/styles/MuiThemeProvider';
import { Link } from 'react-router';
import LoginPage from './components/LoginPage.jsx';

import injectTapEventPlugin from 'react-tap-event-plugin';
injectTapEventPlugin();


class App extends React.Component {

    render() {
        return (
            <MuiThemeProvider>
                <LoginPage />
            </MuiThemeProvider>
        );
    }
}

export default App;