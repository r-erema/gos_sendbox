import React from 'react';
import RaisedButton from 'material-ui/RaisedButton';

import './LoginPage.less';

class App extends React.Component {

    static handleLogin() {
        console.log('login clicked');
    };

    render () {
        return (
            <div className="LoginPage">
                <div className="LoginPage__banner">
                    <div className="LoginPage_text">
                        <h1>Almost Google tasks</h1>
                        <p>Organise your life!</p>
                        <RaisedButton className='login-button' label='Log in with Google' onClick={this.handleLogin} />
                    </div>
                    <img src="img/desk.png" alt="Desk" className="LoginPage__image"/>
                </div>
            </div>
        );
    };
}

export default App;